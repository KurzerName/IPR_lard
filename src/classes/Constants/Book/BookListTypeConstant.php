<?php

namespace classes\Constants\Book;

class BookListTypeConstant
{
    const DEFAULT_TYPE_ID = 1;
    const PREMIUM_TYPE_ID = 2;

    const DEFAULT_TYPE_NAME = 'Обычный';
    const PREMIUM_TYPE_NAME = 'Премиум';

    const LIST_TYPE_COST = [
        self::DEFAULT_TYPE_ID => 1,
        self::PREMIUM_TYPE_ID => 3,
    ];
}