<?php

namespace classes\Models;

use classes\Repositories\Repository;

interface Model
{
    /**
     * @return Repository
     */
    static public function getRepository(): Repository;
}