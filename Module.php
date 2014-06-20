<?php


namespace Voice;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements AutoloaderProviderInterface, ConfigProviderInterface, ServiceProviderInterface
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return [
            'invokables' => [
                'Voice\Model\PositionTable'=>'Voice\Model\PositionTable'
            ]
        ];
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}