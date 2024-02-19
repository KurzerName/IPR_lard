<?php

namespace classes\Repositories\Author;

use classes\Models\Author\AuthorModel;
use classes\Models\Model;
use classes\Repositories\Repository;
use classes\Validator\AuthorValidator;

class AuthorRepository extends Repository
{
    protected ?AuthorValidator $validator = null;

    /** @var AuthorModel[]  */
    private static array $authors = [];

    public function __construct()
    {
        $this->validator = new AuthorValidator();
    }

    /**
     * @param int $id
     *
     * @return AuthorModel|null
     */
    public function get(int $id): ?Model
    {
        $this->validator->validateGet($id);

        return self::$authors[$id] ?? null;
    }

    /**
     * @param AuthorModel $model
     *
     * @throws ValidateException
     * @return int
     */
    public function create(Model $model): int
    {
        $this->validator->validateCreate($model);

        $id = time() % 1000;

        self::$authors[$id] = $model;

        return $id;
    }

    /**
     * @param AuthorModel $model
     *
     * @throws ValidateException
     * @return void
     */
    public function update(Model $model): void
    {
        $this->validator->validateUpdate($model);

        if (!self::$authors[$model->getId()]) {
            return;
        }

        self::$authors[$model->getId()] = $model;
    }

    /**
     * @param AuthorModel $model
     *
     * @return void
     */
    public function delete(Model $model): void
    {
        unset(self::$authors[$model->getId()]);
    }
}