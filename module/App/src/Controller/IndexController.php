<?php

namespace App\Controller;

use Zend\View\Model\ViewModel;

class IndexController extends AbstractController
{
    public function indexAction()
    {
        $service = $this->getDomainService('Company');

        return new ViewModel(array(
            'companies' => $service->getAll()
        ));
    }

    public function detailAction()
    {
        $service = $this->getDomainService('Company');

        $company = $service->getById($this->params()->fromRoute('id'));
        $cars = $company->getCars(); //Doctrine loads these automatically!

        return new ViewModel(array(
            'company' => $company
        ));
    }

    public function createAction()
    {
        $company = new \App\Domain\Company();
        $company->setName('My Company');

        $service = $this->getDomainService('Company');
        $service->persist($company);

        return $this->redirect();
    }
}
