<?php

namespace App\Navigation;

use Zend\Navigation\Service\AbstractNavigationFactory;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Navigation\Navigation;

class AppNavigationFactory extends AbstractNavigationFactory
{
    /**
     * @return string
     */
    protected function getName()
    {
        return 'app';
    }

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Zend\Navigation\Navigation
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        // build the menu from config
        $pages = $this->getPages($serviceLocator);
        $factory = new \Zend\Navigation\Service\ConstructedNavigationFactory($pages);
        $navigation = $factory->createService($serviceLocator);

        // get nessecary resources for adding pages
        $application = $serviceLocator->get('Application');
        $routeMatch  = $application->getMvcEvent()->getRouteMatch();
        $router      = $application->getMvcEvent()->getRouter();

        // add authentication module navigation
        $authNav = $serviceLocator->get('CtrlAuthNavigation');
        $authItem = array(
            'label' => 'Auth Module',
            'route' => 'ctrl_auth',
            'pages' => $authNav->getPages(),
            'type' => 'Ctrl\Navigation\Page\Mvc',
            'router' => $router,
            'routeMatch' => $routeMatch,
        );
        $navigation->addPage($authItem);

        return $navigation;
    }
}
