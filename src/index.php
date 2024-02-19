<?php

use classes\Models\Author\AuthorModel;
use classes\Models\Book\BookModel;
use classes\Models\Book\Chapter\BookChapterModel;
use classes\Models\Book\List\BookListModel;
use classes\Models\Shop\ShopModel;

include_once 'header_dll.php';

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

try {
    $shop = new ShopModel();

    $shop
        ->setName('Буквоед')
        ->setAddress('Тестовый адрес 2')
        ->setPriceCoefficient(1)
        ;

    $shopId = $shop::getRepository()->create($shop);
    $shop   = $shop::getRepository()->get($shopId);

    $author = new AuthorModel();

    $author
        ->setName('Тест')
        ->setSecondName('Тестов')
        ->setPatronymic('Тестович')
        ->setBirthDate(new DateTime('01.01.1970'))
        ->setDeathDate(new DateTime('01.01.2020'))
    ;

    $authorId = $author::getRepository()->create($author);
    $author   = $author::getRepository()->get($authorId);

    $book = new BookModel();
    $book
        ->setName('Test book')
        ->setAuthor($author)
        ->setShop($shop)
        ->setReleaseDate(new DateTime('31.12.2019'))
    ;

    $bookId = $book::getRepository()->create($book);
    $book   = $book::getRepository()->get($bookId);
} catch (Exception $exception) {
    printPre($exception->getMessage());

    exit();
}

$chapters   = [];
$listsIndex = 1;

for($i = 1; $i <= 2; $i++, $listsIndex++) {
    $bookChapter = new BookChapterModel();

    $bookChapter
        ->setChapterNumber($i)
        ->setListNumber($listsIndex)
        ->setTitle("Chapter number {$i}")
        ->setBook($book)
    ;

    $lists = [];

    for($j = 1; $j <= 3; $j++, $listsIndex++) {
        $bookList = new BookListModel();

        $bookList
            ->setBook($book)
            ->setText("Test text {$j}")
            ->setListNumber($listsIndex)
            ->setListType(new classes\Models\Book\Material\ListType\DefaulBookListModel())
        ;

        $lists[] = $bookList;
    }

    $bookChapter->setLists(...$lists);

    $chapters[] = $bookChapter;
}

$book->addBookComponent(...$chapters);

$cost = BookModel::getRepository()->getCost($book);

printPre($cost);
