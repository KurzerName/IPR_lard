<?php

namespace classes\Repositories\Book\Material;

use classes\Constants\Book\BookListTypeConstant;
use classes\Fabrics\Book\BookListTypeFabric;
use classes\Models\Book\Material\ListType\BookListTypeModel;
use classes\Models\Model;
use classes\Repositories\Repository;

class BookListTypeRepository extends Repository
{
    /**
     * @param BookListTypeModel $listType
     *
     * @return int
     */
    static public function getCost(BookListTypeModel $listType): int
    {
        return BookListTypeConstant::LIST_TYPE_COST[$listType->getId()] ?? 0;
    }

    /**
     * @param int $id
     *
     * @return BookListTypeModel|null
     */
    public function get(int $id): ?Model
    {
        return BookListTypeFabric::getListTypeById($id);
    }

    public function create(Model $model): int
    {
        return 0;
    }

    public function update(Model $model): void
    {

    }

    public function delete(Model $model): void
    {

    }
}