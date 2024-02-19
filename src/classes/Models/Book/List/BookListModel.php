<?php

namespace classes\Models\Book\List;

use classes\Models\Book\BookComponent;
use classes\Models\Book\BookModel;
use classes\Models\Book\Chapter\BookChapterModel;
use classes\Models\Book\Material\ListType\BookListTypeModel;
use classes\Models\Model;
use classes\Repositories\Book\List\BookListRepository;
use classes\Repositories\Repository;

class BookListModel implements Model, BookComponent
{
    private int $id;

    private int $listNumber;

    private string $text;

    private ?BookListTypeModel $listType = null;

    private ?BookModel $book = null;

    private ?BookChapterModel $chapter = null;

    /**
     * @return BookListRepository
     */
    static public function getRepository(): Repository
    {
        return new BookListRepository();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getListNumber(): int
    {
        return $this->listNumber;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->text;
    }

    /**
     * @return BookListTypeModel
     */
    public function getListType(): BookListTypeModel
    {
        return $this->listType;
    }

    /**
     * @return BookChapterModel|null
     */
    public function getChapter(): ?BookChapterModel
    {
        return $this->chapter;
    }

    /**
     * @return BookModel|null
     */
    public function getBook(): ?BookModel
    {
        return $this->book;
    }

    /**
     * @param int $id
     *
     * @return BookListModel
     */
    public function setId(int $id): BookListModel
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param int $listNumber
     *
     * @return BookListModel
     */
    public function setListNumber(int $listNumber): BookListModel
    {
        $this->listNumber = $listNumber;

        return $this;
    }

    /**
     * @param string $text
     *
     * @return BookListModel
     */
    public function setText(string $text): BookListModel
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @param BookListTypeModel $listType
     *
     * @return BookListModel
     */
    public function setListType(BookListTypeModel $listType): BookListModel
    {
        $this->listType = $listType;

        return $this;
    }

    /**
     * @param BookModel $book
     *
     * @return BookListModel
     */
    public function setBook(BookModel $book): BookListModel
    {
        $this->book = $book;

        return $this;
    }

    /**
     * @param BookChapterModel|null $chapter
     *
     * @return BookListModel
     */
    public function setChapter(?BookChapterModel $chapter): BookListModel
    {
        $this->chapter = $chapter;

        return $this;
    }
}