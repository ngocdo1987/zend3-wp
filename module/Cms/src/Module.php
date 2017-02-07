<?php
namespace Cms;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\CategoryTable::class => function($container) {
                    $tableGateway = $container->get(Model\CategoryTableGateway::class);
                    return new Model\CategoryTable($tableGateway);
                },
                Model\CategoryTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Category());
                    return new TableGateway('category', $dbAdapter, null, $resultSetPrototype);
                },

                Model\PageTable::class => function($container) {
                    $tableGateway = $container->get(Model\PageTableGateway::class);
                    return new Model\PageTable($tableGateway);
                },
                Model\PageTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Page());
                    return new TableGateway('page', $dbAdapter, null, $resultSetPrototype);
                },

                Model\PostTable::class => function($container) {
                    $tableGateway = $container->get(Model\PostTableGateway::class);
                    return new Model\PostTable($tableGateway);
                },
                Model\PostTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Post());
                    return new TableGateway('post', $dbAdapter, null, $resultSetPrototype);
                },

                Model\TagTable::class => function($container) {
                    $tableGateway = $container->get(Model\TagTableGateway::class);
                    return new Model\TagTable($tableGateway);
                },
                Model\TagTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Tag());
                    return new TableGateway('tag', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }

    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\CategoryController::class => function($container) {
                    return new Controller\CategoryController(
                        $container->get(Model\CategoryTable::class)
                    );
                },
                Controller\PageController::class => function($container) {
                    return new Controller\PageController(
                        $container->get(Model\PageTable::class)
                    );
                },
                Controller\PostController::class => function($container) {
                    return new Controller\PostController(
                        $container->get(Model\PostTable::class)
                    );
                },
                Controller\TagController::class => function($container) {
                    return new Controller\TagController(
                        $container->get(Model\TagTable::class)
                    );
                }
                /*
                Controller\PostController::class => function($container) {
                    return new Controller\PostController();
                }
                */
            ],
        ];
    }
}