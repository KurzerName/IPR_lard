<?php

namespace classes\Models\Book\Material\CoverType;

use classes\Constants\Book\BookCoverTypeConstant;

class PaperModelBookCoverModel extends BookCoverTypeModel
{
    public function getId(): int
    {
        return BookCoverTypeConstant::PAPER_TYPE_ID;
    }

    public function getName(): string
    {
        return BookCoverTypeConstant::PAPER_TYPE_NAME;
    }
}