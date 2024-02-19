<?php

namespace classes\Models\Book\Chapter;

use classes\Models\Book\BookComponent;
use classes\Models\Book\BookModel;
use classes\Models\Book\List\BookListModel;
use classes\Models\Model;
use classes\Repositories\Book\Chapter\BookChapterRepository;
use classes\Repositories\Repository;

class BookChapterModel implements Model, BookComponent
{
    private int $id;

    private int $chapterNumber;

    private int $listNumber;

    private string $title;

    private ?BookModel $book = null;

    /** @var BookListModel[]  */
    private array $lists = [];

    /**
     * @return BookChapterRepository
     */
    static public function getRepository(): Repository
    {
        return new BookChapterRepository();
    }

    /**
     * @return BookListModel[]
     */
    public function getLists(): array
    {
        return $this->lists;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getChapterNumber(): int
    {
        return $this->chapterNumber;
    }

    /**
     * @return BookModel|null
     */
    public function getBook(): ?BookModel
    {
        return $this->book;
    }

    /**
     * @return int
     */
    public function getListNumber(): int
    {
        return $this->listNumber;
    }

    /**
     * @param int $id
     *
     * @return BookChapterModel
     */
    public function setId(int $id): BookChapterModel
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param int $chapterNumber
     *
     * @return BookChapterModel
     */
    public function setChapterNumber(int $chapterNumber): BookChapterModel
    {
        $this->chapterNumber = $chapterNumber;

        return $this;
    }

    /**
     * @param BookModel|null $book
     *
     * @return BookChapterModel
     */
    public function setBook(?BookModel $book): BookChapterModel
    {
        $this->book = $book;

        return $this;
    }

    /**
     * @param string $title
     *
     * @return BookChapterModel
     */
    public function setTitle(string $title): BookChapterModel
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param int $listNumber
     *
     * @return BookChapterModel
     */
    public function setListNumber(int $listNumber): BookChapterModel
    {
        $this->listNumber = $listNumber;

        return $this;
    }

    /**
     * @param BookListModel[] $lists
     *
     * @return BookChapterModel
     */
    public function setLists(BookListModel ...$lists): BookChapterModel
    {
        $this->lists = $lists;

        return $this;
    }

    /**
     * @param BookListModel[] ...$lists
     *
     * @return BookChapterModel
     */
    public function addLists(array ...$lists): BookChapterModel
    {
        $this->lists = array_merge($this->lists, $lists);

        return $this;
    }
}