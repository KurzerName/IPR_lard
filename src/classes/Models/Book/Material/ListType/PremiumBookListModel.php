<?php

namespace classes\Models\Book\Material\ListType;

use classes\Constants\Book\BookListTypeConstant;

class PremiumBookListModel extends BookListTypeModel
{
    public function getId(): int
    {
        return BookListTypeConstant::PREMIUM_TYPE_ID;
    }

    public function getName(): string
    {
        return BookListTypeConstant::PREMIUM_TYPE_NAME;
    }
}