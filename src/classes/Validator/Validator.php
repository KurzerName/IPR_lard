<?php

namespace classes\Validator;

use classes\Exceptions\ValidateException;
use classes\Models\Model;

abstract class Validator
{
    protected array $errors = [];

    /**
     * @param int $id
     *
     * @return void
     */
    abstract public function validateGet(int $id): void;

    /**
     * @param Model|null $model
     *
     * @return void
     */
    abstract public function validateCreate(?Model $model): void;

    /**
     * @param Model|null $model
     *
     * @return void
     */
    abstract public function validateUpdate(?Model $model): void;

    /**
     * @param Model|null $model
     *
     * @return void
     */
    abstract public function validateDelete(?Model $model): void;

    /**
     * @param Model|null $model
     *
     * @return void
     */
    abstract public function validateModel(?Model $model): void;

    /**
     * @throws ValidateException
     * @return mixed
     */
    protected function throwErrors(): mixed
    {
        throw new ValidateException(implode(', ', $this->errors));
    }
}