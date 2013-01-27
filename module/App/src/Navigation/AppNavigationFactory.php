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
     * @param \Zend\ServiceManager\ServiceLocatorInterface $serviceLocator
     * @return \Zend\Navigation\Navigation
     * @throws \Exception
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        // build the menu from config
        $pages = $this->getPages($serviceLocator);
        $factory = new \Zend\Navigation\Service\ConstructedNavigationFactory($pages);
        /** @var $navigation Navigation */
        $navigation = $factory->createService($serviceLocator);

        // get nessecary resources for adding pages
        $application = $serviceLocator->get('Application');
        $routeMatch  = $application->getMvcEvent()->getRouteMatch();
        $router      = $application->getMvcEvent()->getRouter();

        // add ctrlBlog module navigation
        try {
            $blogNav = $serviceLocator->get('CtrlBlogNavigation');
            $blogItem = array(
                'label' => 'Blog Module',
                'route' => 'ctrl_blog/default',
                'pages' => $blogNav->getPages(),
                'type' => 'Ctrl\Navigation\Page\Mvc',
                'router' => $router,
            );
            if ($routeMatch) $blogItem['routeMatch'] = $routeMatch;
            $navigation->addPage($blogItem);
        } catch (\Exception $e) {
            // blog module not loaded?
            throw $e;
        }

        // add ctrlAuth module navigation
        try {
            $authNav = $serviceLocator->get('CtrlAuthNavigation');
            $authItem = array(
                'label' => 'Auth Module',
                'route' => 'ctrl_auth/default',
                'pages' => $authNav->getPages(),
                'type' => 'Ctrl\Navigation\Page\Mvc',
                'router' => $router,
            );
            if ($routeMatch) $authItem['routeMatch'] = $routeMatch;
            $navigation->addPage($authItem);
        } catch (\Exception $e) {
            // auth module not loaded?
            throw $e;
        }

        return $navigation;
    }
}
