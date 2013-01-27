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

    /**
     * @param \App\Domain\Company $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return \App\Domain\Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param string $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param int $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }
}
