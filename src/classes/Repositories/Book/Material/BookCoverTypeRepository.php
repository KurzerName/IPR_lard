<?php

namespace classes\Repositories\Book\Material;

use classes\Constants\Book\BookCoverTypeConstant;
use classes\Fabrics\Book\BookCoverTypeFabric;
use classes\Models\Book\Material\CoverType\BookCoverTypeModel;
use classes\Models\Model;
use classes\Repositories\Repository;

class BookCoverTypeRepository extends Repository
{

    /**
     * @param BookCoverTypeModel $bookCover
     *
     * @return int
     */
    static public function getCost(BookCoverTypeModel $bookCover): int
    {
        return BookCoverTypeConstant::COVER_TYPE_COST[$bookCover->getId()] ?? 0;
    }

    /**
     * @param int $id
     *
     * @return BookCoverTypeModel|null
     */
    public function get(int $id): ?Model
    {
        return BookCoverTypeFabric::getCoverTypeById($id);
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