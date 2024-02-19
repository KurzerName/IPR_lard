<?php

namespace classes\Validator;

use classes\Exceptions\ValidateException;
use classes\Models\Author\AuthorModel;
use classes\Models\Model;

class AuthorValidator extends Validator
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
     * @param AuthorModel|null $model
     *
     * @throws ValidateException
     * @return void
     */
    public function validateCreate(?Model $model): void
    {
        $this->validateModel($model);
    }

    /**
     * @param AuthorModel|null $model
     *
     * @throws ValidateException
     * @return void
     */
    public function validateUpdate(?Model $model): void
    {
        $this->validateModel($model);
    }

    /**
     * @param AuthorModel|null $model
     *
     * @return void
     */
    public function validateDelete(?Model $model): void
    {

    }

    /**
     * @param AuthorModel|null $model
     *
     * @throws ValidateException
     * @return void
     */
    public function validateModel(?Model $model): void
    {
        if (!$model) {
            throw new ValidateException('Отсутствует автор');
        }

        if (!$model->getName() || !$model->getSecondName()) {
            throw new ValidateException('Отсутствует имя или фамилия');
        }

        if (!$model->getBirthDate()) {
            throw new ValidateException('Не указана дата рождения');
        }

        $livedAges = $model->getAge();

        if ($model->getDeathDate()) {
            $livedAges = $model->getBirthDate()->diff($model->getDeathDate());
        }

        if ($livedAges->invert) {
            $this->errors[] = 'Некорректная дата рождения и дата смерти';
        }

        if ($livedAges->y < 20) {
            $this->errors[] = 'Автору должно быть больше 19-и лет';
        }

        if ($this->errors) {
            $this->throwErrors();
        }
    }
}