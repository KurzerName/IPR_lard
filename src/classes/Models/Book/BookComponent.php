<?php

namespace classes\Models\Book;

interface BookComponent
{
    public function getListNumber(): int;

    public function getValue(): string;

    public function setListNumber(int $listNumber): BookComponent;
}