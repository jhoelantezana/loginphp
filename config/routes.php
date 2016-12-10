<?php
    define('ROUTES',[
        'blog/post' => [
            'controller'    => 'Blog',
            'action'        => 'showPost'
        ],
        /*============================= Inicio O BLOG =================================*/
        '' => [
            'controller'    => 'Page',
            'action'        => 'index'
        ],
        'index' => [
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
        /*============================= Control Blog ====================================*/
        'blog/newpost' => [
            'controller'    => 'Blog',
            'action'        => 'newPost'
        ],
        'blog/admin' => [
            'controller'    => 'Blog',
            'action'        => 'addminPost'
        ],
        'blog/delete' => [
            'controller'    => 'Blog',
            'action'        => 'deletePost'
        ],
        'blog/edit' => [
            'controller'    => 'Blog',
            'action'        => 'editPost'
        ],
        'blog/update' => [
            'controller'    => 'Blog',
            'action'        => 'updatePost'
        ],
    ]);