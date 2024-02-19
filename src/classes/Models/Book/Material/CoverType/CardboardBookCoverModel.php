<?php

namespace classes\Models\Book\Material\CoverType;

use classes\Constants\Book\BookCoverTypeConstant;

class CardboardBookCoverModel extends BookCoverTypeModel
{
    public function getId(): int
    {
        return BookCoverTypeConstant::CARDBOARD_TYPE_ID;
    }

    public function getName(): string
    {
        return BookCoverTypeConstant::CARDBOARD_TYPE_NAME;
    }
}