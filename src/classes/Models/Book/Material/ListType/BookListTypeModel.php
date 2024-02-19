<?php

namespace classes\Models\Book\Material\ListType;

use classes\Models\Model;
use classes\Repositories\Book\Material\BookCoverTypeRepository;
use classes\Repositories\Repository;

abstract class BookListTypeModel implements Model
{
    /**
     * @return BookCoverTypeRepository
     */
    static public function getRepository(): Repository
    {
        return new BookCoverTypeRepository();
    }

    /**
     * @return int
     */
    abstract public function getId(): int;

    /**
     * @return string
     */
    abstract public function getName(): string;
}