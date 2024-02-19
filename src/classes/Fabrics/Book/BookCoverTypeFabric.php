<?php

namespace classes\Fabrics\Book;

use classes\Constants\Book\BookCoverTypeConstant;
use classes\Models\Book\Material\CoverType\BookCoverTypeModel;
use classes\Models\Book\Material\CoverType\CardboardBookCoverModel;
use classes\Models\Book\Material\CoverType\GlossyModelBookCoverModel;
use classes\Models\Book\Material\CoverType\PaperModelBookCoverModel;

class BookCoverTypeFabric
{
    /**
     * @param int $id
     *
     * @return BookCoverTypeModel|null
     */
    static public function getCoverTypeById(int $id): ?BookCoverTypeModel
    {
        $coverType = self::getCoverTypes()[$id] ?? null;

        if (!$coverType) {
            return null;
        }

        return new $coverType();
    }

    /**
     * @return string[]
     */
    static public function getCoverTypes(): array
    {
        return [
            BookCoverTypeConstant::CARDBOARD_TYPE_ID => CardboardBookCoverModel::class,
            BookCoverTypeConstant::PAPER_TYPE_ID     => PaperModelBookCoverModel::class,
            BookCoverTypeConstant::GLOSSY_TYPE_ID    => GlossyModelBookCoverModel::class,
        ];
    }
}