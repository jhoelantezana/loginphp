<?php
    define('ROUTERPUBLIC',[
        '' => [
            'controller'    => 'Page',
            'action'        => 'session'
        ],
        'session' => [
            'controller'    => 'Page',
            'action'        => 'session'
        ],
        'session/login' => [
            'controller'    => 'Session',
            'action'        => 'sessionValidator'
        ],
        'session/register' => [
            'controller'    => 'Session',
            'action'        => 'register'
        ],
        'register-user' => [
            'controller'    => 'Page',
            'action'        => 'register'
        ],
    ]);