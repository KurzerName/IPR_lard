<?php

namespace classes\Models\Book\Material\CoverType;

use classes\Models\Model;
use classes\Repositories\Book\Material\BookCoverTypeRepository;
use classes\Repositories\Repository;

abstract class BookCoverTypeModel implements Model
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