<?php

namespace classes\Repositories;

use classes\Models\Model;

abstract class Repository
{
    /**
     * @param int $id
     *
     * @return Model|null
     */
    abstract public function get(int $id): ?Model;

    /**
     * @param Model $model
     *
     * @throws \Exception
     *
     * @return int
     */
    abstract public function create(Model $model): int;

    /**
     * @param Model $model
     *
     * @throws \Exception
     *
     * @return void
     */
    abstract public function update(Model $model): void;

    /**
     * @param Model $model
     *
     * @throws \Exception
     *
     * @return void
     */
    abstract public function delete(Model $model): void;
}