<?php

namespace classes\Validator;

use classes\Exceptions\ValidateException;
use classes\Models\Book\BookModel;
use classes\Models\Model;
use classes\Models\Shop\ShopModel;

class ShopValidator extends Validator
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
     * @param ShopModel $model
     *
     * @throws \classes\Exceptions\ValidateException
     * @return void
     */
    public function validateCreate(?Model $model): void
    {
        $this->validateModel($model);
    }

    /**
     * @param ShopModel $model
     *
     * @throws \classes\Exceptions\ValidateException
     * @return void
     */
    public function validateUpdate(?Model $model): void
    {
        $this->validateModel($model);
    }

    /**
     * @param Model $model
     *
     * @return void
     */
    public function validateDelete(?Model $model): void
    {

    }

    /**
     * @param ShopModel $shop
     * @param BookModel $book
     *
     * @throws ValidateException
     * @return void
     */
    public function validateAddBook(ShopModel $shop, BookModel $book): void
    {
        $this->validateModel($shop);

        $bookValidator = new BookValidator();

        $bookValidator->validateModel($book);
    }

    /**
     * @param ShopModel|null $model
     *
     * @throws \classes\Exceptions\ValidateException
     * @return void
     */
    public function validateModel(?Model $model): void
    {
        if (!$model) {
            throw new ValidateException('Отсутствует магазин');
        }

        if (!$model->getName()) {
            throw new ValidateException('Пустое наименование');
        } else if (mb_strlen($model->getName()) <= 3) {
            $this->errors[] = 'Наименование менее 3 символов';
        }

        if (!$model->getAddress()) {
            $this->errors[] = 'Пустой адрес';
        }

        if ($model->getPriceCoefficient() > 1 || $model->getPriceCoefficient() < 0) {
            $this->errors[] = 'Коэффицент цены должен быть больше или равен 0, но меньше или равен 1';
        }

        if ($this->errors) {
            $this->throwErrors();
        }
    }
}