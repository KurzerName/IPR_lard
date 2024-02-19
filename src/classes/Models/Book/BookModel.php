<?php
namespace classes\Models\Book;

use classes\Models\Author\AuthorModel;
use classes\Models\Book\Chapter\BookChapterModel;
use classes\Models\Book\List\BookListModel;
use classes\Models\Book\Material\CoverType\BookCoverTypeModel;
use classes\Models\Model;
use classes\Models\Shop\ShopModel;
use classes\Repositories\Book\BookRepository;
use classes\Repositories\Repository;

class BookModel implements Model
{
    private int $id = 0;

    private float $priceCoefficient = 0;

    private string $name = '';

    private ?\DateTime $releaseDate = null;

    private ?BookCoverTypeModel $coverType = null;

    private ?AuthorModel $author = null;

    private ?ShopModel $shop = null;

    /** @var BookListModel[]  */
    private array $lists = [];

    /** @var BookChapterModel[]  */
    private array $chapters = [];

    /** @var BookComponent[]  */
    private array $bookComponents = [];

    /**
     * @return BookRepository
     */
    static public function getRepository(): Repository
    {
        return new BookRepository();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return float
     */
    public function getPriceCoefficient(): float
    {
        return $this->priceCoefficient;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return \DateTime|null
     */
    public function getReleaseDate(): ?\DateTime
    {
        return $this->releaseDate;
    }

    /**
     * @return BookCoverTypeModel|null
     */
    public function getCoverType(): ?BookCoverTypeModel
    {
        return $this->coverType;
    }

    /**
     * @return AuthorModel|null
     */
    public function getAuthor(): ?AuthorModel
    {
        return $this->author;
    }

    /**
     * @return BookListModel[]
     */
    public function getLists(): array
    {
        return $this->lists;
    }

    /**
     * @return BookChapterModel[]
     */
    public function getChapters(): array
    {
        return $this->chapters;
    }

    /**
     * @return ShopModel|null
     */
    public function getShop(): ?ShopModel
    {
        return $this->shop;
    }

    /**
     * @return BookComponent[]
     */
    public function getBookComponents(): array
    {
        return $this->bookComponents;
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId(int $id): BookModel
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param float $priceCoefficient
     *
     * @return BookModel
     */
    public function setPriceCoefficient(float $priceCoefficient): BookModel
    {
        $this->priceCoefficient = $priceCoefficient;

        return $this;
    }

    /**
     * @param string $name
     *
     * @return BookModel
     */
    public function setName(string $name): BookModel
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param \DateTime|null $releaseDate
     *
     * @return BookModel
     */
    public function setReleaseDate(?\DateTime $releaseDate): BookModel
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * @param BookCoverTypeModel $coverType
     *
     * @return BookModel
     */
    public function setCoverType(BookCoverTypeModel $coverType): BookModel
    {
        $this->coverType = $coverType;

        return $this;
    }

    /**
     * @param AuthorModel|null $author
     *
     * @return BookModel
     */
    public function setAuthor(?AuthorModel $author): BookModel
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @param ShopModel $shop
     *
     * @return BookModel
     */
    public function setShop(ShopModel $shop): BookModel
    {
        $this->shop = $shop;

        return $this;
    }

    /**
     * @param BookComponent[] $bookComponents
     *
     * @return BookModel
     */
    public function setBookComponents(BookComponent ...$bookComponents): BookModel
    {
        $this->bookComponents = $bookComponents;

        return $this;
    }

    /**
     * @param BookComponent[] $bookComponents
     *
     * @return BookModel
     */
    public function addBookComponent(BookComponent ...$bookComponents): BookModel
    {
        $this->bookComponents = array_merge($this->bookComponents, $bookComponents);

        return $this;
    }
}