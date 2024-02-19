<?php

namespace classes\Repositories\Book;


use classes\Constants\Book\BookListTypeConstant;
use classes\Models\Book\BookComponent;
use classes\Models\Book\BookModel;
use classes\Models\Book\List\BookListModel;
use classes\Models\Book\Material\CoverType\CardboardBookCoverModel;
use classes\Models\Model;
use classes\Repositories\Book\Material\BookCoverTypeRepository;
use classes\Repositories\Book\Material\BookListTypeRepository;
use classes\Repositories\Repository;
use classes\Validator\BookValidator;
use ReflectionClass;

class BookRepository extends Repository
{
    protected ?BookValidator $validator = null;

    /** @var BookModel[]  */
    private static array $books = [];

    public function __construct()
    {
        $this->validator = new BookValidator();
    }

    /**
     * @param int $id
     *
     * @return Model|null
     */
    public function get(int $id): ?Model
    {
        $this->validator->validateGet($id);

        return self::$books[$id] ?? null;
    }

    /**
     * @param BookModel $bookModel
     *
     * @return BookComponent[]
     */
    public function getLists(BookModel $bookModel): array
    {
        $result = [];

        foreach ($bookModel->getBookComponents() as $component) {
            $lists = $component->getLists();

            if ($lists) {
                $result = array_merge($result, $lists);
            } else {
                $result[] = $component;
            }
        }

        return $result;
    }

    /**
     * @param BookModel $book
     *
     * @throws \classes\Exceptions\ValidateException
     * @return int
     */
    public function getCost(BookModel $book): int
    {
        $this->validator->validateModel($book);

        $shop         = $book->getShop();
        $coverCost    = BookCoverTypeRepository::getCost($book->getCoverType());
        $bookLists    = $this->getLists($book);
        $countLists   = count($bookLists);
        $listTypeCost = BookListTypeConstant::DEFAULT_TYPE_ID;

        if ($bookLists) {
            $listTypeCost = BookListTypeRepository::getCost($bookLists[0]->getListType());
        }

        return $shop->getPriceCoefficient() + ($book->getPriceCoefficient() * 7) + $countLists * $listTypeCost + $coverCost;
    }

    /**
     * @param BookModel $book
     * @param int       $listNumber
     *
     * @return BookListModel|null
     */
    public function getListByListNumber(Model $book, int $listNumber): ?BookListModel
    {
        foreach ($book->getLists() as $list) {
            if ($list->getListNumber() === $listNumber) {
                return $list;
            }
        }

        return null;
    }

    /**
     * @param BookModel $model
     *
     * @throws \classes\Exceptions\ValidateException
     * @return int
     */
    public function create(Model $model): int
    {
        if (!$model->getCoverType()) {
            $model->setCoverType(new CardboardBookCoverModel());
        }

        $this->validator->validateCreate($model);

        $id = time() % 1000;

        self::$books[$id] = $model;

        return $id;
    }

    /**
     * @param BookModel $model
     *
     * @throws \classes\Exceptions\ValidateException
     * @return void
     */
    public function update(Model $model): void
    {
        $this->validator->validateUpdate($model);

        if (!self::$books[$model->getId()]) {
            return;
        }

        self::$books[$model->getId()] = $model;
    }

    /**
     * @param BookModel $model
     *
     * @return void
     */
    public function delete(Model $model): void
    {
        unset(self::$books[$model->getId()]);
    }

    /**
     * @param BookModel $book
     *
     * @return BookModel
     */
    public function copy(BookModel $book): BookModel
    {
        $newBook    = new BookModel();
        $reflection = new ReflectionClass(BookModel::class);
        $props      = $reflection->getProperties();

        foreach ($props as $property) {
            $actionName  = mb_strtoupper($property[0]) . mb_substr($property, 1);
            $copiedValue = $book->{"get{$actionName}"}();

            $newBook->{"set{$actionName}"}($copiedValue);
        }

        return $newBook;
    }
}