<?php

namespace classes\Repositories\Shop;

use classes\Exceptions\ValidateException;
use classes\Models\Book\BookModel;
use classes\Models\Model;
use classes\Models\Shop\ShopModel;
use classes\Repositories\Book\BookRepository;
use classes\Repositories\Repository;
use classes\Validator\ShopValidator;

class ShopRepository extends Repository
{
    protected ?ShopValidator $validator = null;

    /** @var ShopModel[] */
    private static array $shops = [];

    public function __construct()
    {
        $this->validator = new ShopValidator();
    }

    /**
     * @param ShopModel $shop
     *
     * @throws ValidateException
     * @return int
     */
    static public function getAllBooksCost(ShopModel $shop): int
    {
        $result         = 0;
        $bookRepository = new BookRepository();

        foreach ($shop->getBooks() as $book) {
            $result += $bookRepository->getCost($book);
        }

        return $result;
    }

    /**
     * @param int $id
     *
     * @throws ValidateException
     * @return ShopModel|null
     */
    public function get(int $id): ?Model
    {
        $this->validator->validateGet($id);

        return self::$shops[$id] ?? null;
    }

    /**
     * @param ShopModel $model
     *
     * @throws ValidateException
     * @return int
     */
    public function create(Model $model): int
    {
        $this->validator->validateCreate($model);

        $id = time() % 1000;

        self::$shops[$id] = $model;

        return $id;
    }

    /**
     * @param ShopModel $shop
     * @param BookModel $book
     *
     * @throws ValidateException
     * @return void
     */
    public function addBook(ShopModel $shop, BookModel $book): void
    {
        $this->validator->validateAddBook($shop, $book);

        $shop->addBook($book);

        self::$shops[$shop->getId()] = $shop;
    }

    /**
     * @param ShopModel $model
     *
     * @throws ValidateException
     * @return void
     */
    public function update(Model $model): void
    {
        $this->validator->validateUpdate($model);

        if (!self::$shops[$model->getId()]) {
            return;
        }

        self::$shops[$model->getId()] = $model;
    }

    /**
     * @param ShopModel $model
     *
     * @return void
     */
    public function delete(Model $model): void
    {
        unset(self::$shops[$model->getId()]);
    }

    /**
     * @param ShopModel $shop
     *
     * @return ShopModel
     */
    public function copy(ShopModel $shop): ShopModel
    {
        $newShop    = new ShopModel();
        $reflection = new ReflectionClass(ShopModel::class);
        $props      = $reflection->getProperties();

        foreach ($props as $property) {
            $actionName  = mb_strtoupper($property[0]) . mb_substr($property, 1);
            $copiedValue = $shop->{"get{$actionName}"}();

            $newShop->{"set{$actionName}"}($copiedValue);
        }

        return $newShop;
    }
}