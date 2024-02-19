<?php

namespace classes\Models\Book\Material\CoverType;

use classes\Constants\Book\BookCoverTypeConstant;

class GlossyModelBookCoverModel extends BookCoverTypeModel
{
    public function getId(): int
    {
        return BookCoverTypeConstant::GLOSSY_TYPE_ID;
    }

    public function getName(): string
    {
        return BookCoverTypeConstant::GLOSSY_TYPE_NAME;
    }
}