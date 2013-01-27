<?php

namespace App\Service;

use App\Domain;
use Ctrl\Service\AbstractDomainModelService;

class CarService extends AbstractDomainModelService
{
    protected $entity = 'App\Domain\Car';
}
