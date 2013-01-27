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

    /**
     * @var array
     */
    protected $catalogDateRange;

    public function setCars($cars)
    {
        $this->cars = $cars;
    }

    public function getCars()
    {
        return $this->cars;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function getCatalogDateRange()
    {
        if (!$this->catalogDateRange) {
            $range['oldest'] = null;
            $range['newest'] = null;
            foreach ($this->getCars() as $car) {
                if ($range['oldest'] == NULL || $car->getYear() < $range['oldest']) {
                    $range['oldest'] = $car->getYear();
                }
                if ($car->getYear() > $range['newest']) {
                    $range['newest'] = $car->getYear();
                }
            }
            $this->catalogDateRange = $range;
        }
        return $this->catalogDateRange;
    }
}
