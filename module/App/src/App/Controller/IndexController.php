<?php

namespace Ctrl\Blog\Controller;

use Ctrl\Controller\AbstractController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractController
{
    public function indexAction()
    {
        return new ViewModel();
    }
}
