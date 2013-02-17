<?php

namespace App;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\EventManager\EventManager;
use Zend\Mvc\ModuleRouteListener;

class Module
{
    /**
     * @param $e \Zend\Mvc\MvcEvent
     */
    public function onBootstrap($e)
    {
        /** @var $eventManager EventManager */
        $eventManager           = $e->getApplication()->getEventManager();
        $serviceManager         = $e->getApplication()->getServiceManager();
        $moduleRouteListener    = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        $this->initLayout($serviceManager, $eventManager);
    }

    protected function initLayout(ServiceLocatorInterface $serviceManager, EventManager $eventManager)
    {
        //feed the flashMessenger vars into the layout
        /** @var $e \Zend\Mvc\MvcEvent */
        $eventManager->attach(\Zend\Mvc\MvcEvent::EVENT_RENDER, function ($e) {

            $serviceManager = $e->getApplication()->getServiceManager();
            $config = $serviceManager->get('Configuration');
            $view = $e->getViewModel();

            if ($view->getTemplate() == 'layout/layout') {

                /** @var $viewManager \Zend\Mvc\View\Http\ViewManager */
                $viewManager = $serviceManager->get('ViewManager');

                // add flash messages
                /** @var $flashMessenger \Zend\Mvc\Controller\Plugin\FlashMessenger */
                $flashMessenger = $serviceManager->get('ControllerPluginManager')->get('flashMessenger');
                $msgNamespaces = array('error', 'success', 'info');
                if ($viewManager->getExceptionStrategy()->displayExceptions()) {
                    $msgNamespaces[] = 'debug';
                }
                $messages = array();
                foreach ($msgNamespaces as $ns) {
                    if ($flashMessenger->setNamespace($ns)->hasMessages()) {
                        $messages[$ns] = $flashMessenger->getMessages();
                    }
                }
                $view->appMessages = $messages;

                // build navigation
                /** @var $navigation \Zend\Navigation\Navigation */
                $navigation = $serviceManager->get('navigation');
                /** @var $navHelper \Ctrl\View\Helper\Navigation\Navigation */
                $navHelper = $serviceManager->get('ViewHelperManager')->get('Navigation');
                // try if we have acl to load
                try {
                    /**
                     * DEBUG: DISABLED ACL FOR NAVIGATION
                     */
                    $acl = $serviceManager->get('CtrlAuthAcl');
                    $navHelper->setAcl($acl);
                    $navHelper->setUseAcl(true);
                    $navHelper->setRoles($serviceManager->get('DomainServiceLoader')->get('CtrlAuthUser')->getAuthenticatedUser()->getRoles()->toArray());
                } catch (\Exception $e) {
                    throw $e;
                }
                $view->navigation = array(
                    'main' => $navigation,
                );
            }
        });
    }

    public function getConfig()
    {
        return array_merge(
            $this->getRouterConfig(),
            include __DIR__ . '/config/module.config.php'
        );
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__.'/src/',
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'AppNavigation' => 'App\Navigation\AppNavigationFactory',
            ),
            'aliases' => array(
                'Navigation' => 'AppNavigation'
            )
        );
    }

    public function getRouterConfig()
    {
        $config = array('router' => array(
            'routes' => array(
                'default' => \Ctrl\Mvc\Router\Http\DefaultSegment::factory('App\Controller'),
            ),
        ));
        return $config;
    }
}
