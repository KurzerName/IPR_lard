<?php

namespace classes\Models\Shop;

use classes\Models\Book\BookModel;
use classes\Models\Model;
use classes\Repositories\Repository;
use classes\Repositories\Shop\ShopRepository;

class ShopModel implements Model
{
    private int $id = 0;

    private string $name = '';

    private string $address = '';

    private float $priceCoefficient = 0;

    /** @var BookModel[]  */
    private array $books = [];

    /**
     * @return ShopRepository
     */
    static public function getRepository(): Repository
    {
        return new \classes\Repositories\Shop\ShopRepository();
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return BookModel[]
     */
    public function getBooks(): array
    {
        return $this->books;
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
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param BookModel $book
     *
     * @return ShopModel
     */
    public function addBook(BookModel $book): ShopModel
    {
        $this->books[] = $book;

        return $this;
    }

    /**
     * @param int $id
     *
     * @return ShopModel
     */
    public function setId(int $id): ShopModel
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $name
     *
     * @return ShopModel
     */
    public function setName(string $name): ShopModel
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param string $address
     *
     * @return ShopModel
     */
    public function setAddress(string $address): ShopModel
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @param float $priceCoefficient
     *
     * @return ShopModel
     */
    public function setPriceCoefficient(float $priceCoefficient): ShopModel
    {
        $this->priceCoefficient = $priceCoefficient;

        return $this;
    }

    /**
     * @param BookModel[] $books
     *
     * @return ShopModel
     */
    public function setBooks(array $books): ShopModel
    {
        $this->books = $books;

        return $this;
    }
}