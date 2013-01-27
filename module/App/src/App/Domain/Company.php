<?php

namespace App\Domain;

use Ctrl\Domain\PersistableModel;

class Company extends PersistableModel
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var Car[]|array
     */
    protected $cars;
}
