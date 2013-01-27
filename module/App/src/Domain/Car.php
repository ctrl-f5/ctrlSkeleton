<?php

namespace App\Domain;

use Ctrl\Domain\PersistableModel;

class Car extends PersistableModel
{
    /**
     * @var Company
     */
    protected $company;

    /**
     * @var string
     */
    protected $model;

    /**
     * @var int
     */
    protected $year;
}
