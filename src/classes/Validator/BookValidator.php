<?php

namespace classes\Validator;

use classes\Exceptions\ValidateException;
use classes\Models\Book\BookModel;
use classes\Models\Model;

class BookValidator extends Validator
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
     * @param BookModel|null $model
     *
     * @throws \classes\Exceptions\ValidateException
     * @return void
     */
    public function validateCreate(?Model $model): void
    {
        $this->validateModel($model);
    }

    /**
     * @param BookModel|null $model
     *
     * @throws \classes\Exceptions\ValidateException
     * @return void
     */
    public function validateUpdate(?Model $model): void
    {
        $this->validateModel($model);
    }

    /**
     * @param BookModel|null $model
     *
     * @return void
     */
    public function validateDelete(?Model $model): void
    {
    }

    /**
     * @param BookModel|null $model
     *
     * @throws \classes\Exceptions\ValidateException
     * @return void
     */
    public function validateModel(?Model $model): void
    {
        if (!$model) {
            throw new ValidateException('Отсутсвует книга');
        }

        if (!$model->getShop()) {
            throw new ValidateException('У книги отсутствует магазин');
        }

        if (!$model->getName()) {
            throw new ValidateException('Пустое наименование');
        } else if (mb_strlen($model->getName()) <= 3) {
            $this->errors[] = 'Наименование менее 3 символов';
        }

        if (!$model->getReleaseDate()) {
            $this->errors[] = 'Отсутствует дата выпуска';
        }

        if ($this->errors) {
            $this->throwErrors();
        }

        if ($model->getAuthor()) {
            $authorValidator = new AuthorValidator();

            $authorValidator->validateModel($model->getAuthor());

            $authorBirthDate = (int)$model->getAuthor()->getBirthDate()->format('Y');
            $authorDeathDate = $model->getAuthor()->getDeathDate();

            if ($authorDeathDate) {
                $authorDeathDate = (int)$authorDeathDate->format('Y');
            }

            $releaseYear = (int)$model->getReleaseDate()->format('Y');

            if (
                $authorBirthDate > $releaseYear
                ||
                ($authorDeathDate && $releaseYear > $authorDeathDate)
            ) {
                $this->errors[] = 'Некорректная дата релиза. Дата релиза должна быть в промежутке жизни автора';
            }
        }

        if ($this->errors) {
            $this->throwErrors();
        }
    }
}