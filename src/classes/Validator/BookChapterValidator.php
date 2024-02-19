<?php

namespace classes\Validator;

use classes\Models\Book\Chapter\BookChapterModel;
use classes\Models\Model;

class BookChapterValidator extends Validator
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
     * @param BookChapterModel|null $model
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
     * @param BookChapterModel|null $model
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
     * @param BookChapterModel|null $model
     *
     * @return void
     */
    public function validateDelete(?Model $model): void
    {

    }

    /**
     * @param BookChapterModel|null $model
     *
     * @return void
     */
    public function validateModel(?Model $model): void
    {
    }
}