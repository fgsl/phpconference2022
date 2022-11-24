<?php

declare(strict_types=1);

namespace Cadastros;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;
use Cadastros\Model\CulturaTableFactory;

return [
    'router' => [
        'routes' => [
            'cultura' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/cultura[/:action]',
                    'defaults' => [
                        'controller' => Controller\CulturaController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\CulturaController::class => Controller\CulturaControllerFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'cadastros/index/index' => __DIR__ . '/../view/cadastros/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'service_manager' => [
        'factories' => [
            'CulturaTable' => CulturaTableFactory::class
        ]
    ]
];
