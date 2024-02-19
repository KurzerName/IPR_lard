<?php

namespace classes\Validator;

use classes\Models\Book\List\BookListModel;
use classes\Models\Model;

class BookListValidator extends Validator
{
    /**
     * @param int $id
     *
     * @return void
     */
    public function validateGet(int $id): void
    {
    }

    /**
     * @param BookListModel $model
     * |null *
     *
     * @throws \classes\Exceptions\ValidateException
     * @return void
     */
    public function validateCreate(?Model $model): void
    {
        $bookValidator = new BookValidator();

        $bookValidator->validateModel($model->getBook());
    }

    /**
     * @param BookListModel|null $model
     *
     * @throws \classes\Exceptions\ValidateException
     * @return void
     */
    public function validateUpdate(?Model $model): void
    {
        $bookValidator = new BookValidator();

        $bookValidator->validateModel($model->getBook());
    }

    /**
     * @param BookListModel|null $model
     *
     * @return void
     */
    public function validateDelete(?Model $model): void
    {

    }

    /**
     * @param BookListModel|null $model
     *
     * @return void
     */
    public function validateModel(?Model $model): void
    {
    }
}