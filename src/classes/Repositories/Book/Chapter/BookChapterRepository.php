<?php

namespace classes\Repositories\Book\Chapter;

use classes\Models\Book\List\BookListModel;
use classes\Models\Model;
use classes\Repositories\Repository;
use classes\Validator\BookChapterValidator;

class BookChapterRepository extends Repository
{
    protected ?BookChapterValidator $validator = null;

    /**
     * @var BookListModel[]
     */
    private static array $bookChapters = [];

    public function __construct()
    {
        $this->validator = new BookChapterValidator();
    }

    /**
     * @param int $id
     *
     * @return Model|null
     */
    public function get(int $id): ?Model
    {
        $this->validator->validateGet($id);

        return self::$bookChapters[$id];
    }

    /**
     * @param Model $model
     *
     * @throws ValidateException
     * @return int
     */
    public function create(Model $model): int
    {
        $this->validator->validateCreate($model);

        $id = time() % 1000;

        self::$bookChapters[$id] = $model;

        return $id;
    }

    /**
     * @param Model $model
     *
     * @throws ValidateException
     * @return void
     */
    public function update(Model $model): void
    {
        $this->validator->validateUpdate($model);

        if (!self::$bookChapters[$model->getId()]) {
            return;
        }

        self::$bookChapters[$model->getId()] = $model;
    }

    /**
     * @param Model $model
     *
     * @return void
     */
    public function delete(Model $model): void
    {
        unset(self::$bookChapters[$model->getId()]);
    }
}