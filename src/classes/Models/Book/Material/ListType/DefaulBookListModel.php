<?php

namespace classes\Models\Book\Material\ListType;

use classes\Constants\Book\BookListTypeConstant;

class DefaulBookListModel extends BookListTypeModel
{
    public function getId(): int
    {
        return BookListTypeConstant::DEFAULT_TYPE_ID;
    }

    public function getName(): string
    {
        return BookListTypeConstant::DEFAULT_TYPE_NAME;
    }
}