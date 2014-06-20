<?php


return array(
    'controllers'=>[
        'invokables'=>[
            'Voice\Controller\Reptile'=>'Voice\Controller\ReptileController'
        ]
    ],
    'router'=>array(
        'routes'=>array(
            'Voice'=>array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/voice[/:controller[/:action]]',
                    'defaults' => array(
                        '__NAMESPACE__'=>'Voice\Controller',
                        'controller' => 'Reptile',
                        'action'     => 'index',
                    ),
                ),
            )
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);