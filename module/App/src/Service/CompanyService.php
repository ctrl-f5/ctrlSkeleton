<?php

namespace App\Service;

use App\Domain;
use Ctrl\Service\AbstractDomainModelService;

class CompanyService extends AbstractDomainModelService
{
    protected $entity = 'App\Domain\Company';
}
