<?php
    define('ROUTES',[
        '' => [
            'controller'    => 'Page',
            'action'        => 'index'
        ],
        /*============================= Admin Users ====================================*/
        'adminusers' => [
            'controller'    => 'User',
            'action'        => 'index'
        ],
        'audelete' => [
            'controller'    => 'User',
            'action'        => 'deleteUsers'
        ],
        'auupdate' => [
            'controller'    => 'User',
            'action'        => 'updateUsers'
        ],
        'auview' => [
            'controller'    => 'User',
            'action'        => 'viewUser'
        ],
        /*============================= Control Sessions ====================================*/
        'session-start' => [
            'controller'    => 'Session',
            'action'        => 'sessionStart'
        ],
        'logout' => [
            'controller'    => 'Session',
            'action'        => 'logout'
        ],
    ]);