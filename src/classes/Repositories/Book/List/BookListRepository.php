<?php

namespace classes\Repositories\Book\List;

use classes\Models\Book\List\BookListModel;
use classes\Models\Book\Material\ListType\DefaulBookListModel;
use classes\Models\Model;
use classes\Repositories\Repository;
use classes\Validator\BookListValidator;

class BookListRepository extends Repository
{
    protected ?BookListValidator $validator = null;

    /**
     * @var BookListModel[]
     */
    private static array $booksList = [];

    public function __construct()
    {
        $this->validator = new BookListValidator();
    }

    /**
     * @param int $id
     *
     * @return BookListModel|null
     */
    public function get(int $id): ?Model
    {
        $this->validator->validateGet($id);

        return self::$booksList[$id];
    }

    /**
     * @param BookListModel $model
     *
     * @throws \classes\Exceptions\ValidateException
     * @return int
     */
    public function create(Model $model): int
    {
        if (!$model->getListType()) {
            $model->setListType(new DefaulBookListModel());
        }

        $this->validator->validateCreate($model);

        $id = time() % 1000;

        self::$booksList[$id] = $model;

        return $id;
    }

    /**
     * @param BookListModel $model
     *
     * @return void
     */
    public function update(Model $model): void
    {
        $this->validator->validateUpdate($model);

        if (!self::$booksList[$model->getId()]) {
            return;
        }

        self::$booksList[$model->getId()] = $model;
    }

    /**
     * @param BookListModel $model
     *
     * @return void
     */
    public function delete(Model $model): void
    {
        unset(self::$booksList[$model->getId()]);
    }
}