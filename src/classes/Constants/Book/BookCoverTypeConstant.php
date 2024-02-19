<?php

namespace classes\Constants\Book;

class BookCoverTypeConstant
{
    const CARDBOARD_TYPE_ID = 1;
    const PAPER_TYPE_ID = 2;
    const GLOSSY_TYPE_ID = 3;

    const CARDBOARD_TYPE_NAME = 'Картон';
    const PAPER_TYPE_NAME = 'Обычная бумага';
    const GLOSSY_TYPE_NAME = 'Глянцевая бумага';

    const COVER_TYPE_COST = [
        self::CARDBOARD_TYPE_ID => 8,
        self::PAPER_TYPE_ID     => 3,
        self::GLOSSY_TYPE_ID    => 20,
    ];
}