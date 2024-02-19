<?php

namespace classes\Fabrics\Book;

use classes\Constants\Book\BookListTypeConstant;
use classes\Models\Book\Material\ListType\BookListTypeModel;
use classes\Models\Book\Material\ListType\DefaulBookListModel;
use classes\Models\Book\Material\ListType\PremiumBookListModel;

class BookListTypeFabric
{
    /**
     * @param int $id
     *
     * @return BookListTypeModel|null
     */
    static public function getListTypeById(int $id): ?BookListTypeModel
    {
        $listType = self::getListTypes()[$id] ?? null;

        if (!$listType) {
            return null;
        }

        return new $listType();
    }

    /**
     * @return string[]
     */
    static public function getListTypes(): array
    {
        return [
            BookListTypeConstant::DEFAULT_TYPE_ID => DefaulBookListModel::class,
            BookListTypeConstant::PREMIUM_TYPE_ID => PremiumBookListModel::class,
        ];
    }
}