<?php
return [
    'main' => [
        [
            'title' => 'Главная',
            'path' => '/',
        ],
//        [
//            'title' => 'Категории',
//            'path' => '/',
//            'type' => 'select',
//        ],
    ],
    'user' => [
        [
            'title' => 'Вход',
            'path' => '/login',
            'isAuth' => false,
        ],
        [
            'title' => 'Регистрация',
            'path' => '/register',
            'isAuth' => false,
        ],
        [
            'title' => 'Профиль',
            'path' => '/account',
            'isAuth' => true,
        ],
        [
            'title' => 'Выход',
            'path' => '/logout',
            'isAuth' => true,
        ],
    ],
    'admin' => [
        [
            'title' => 'Personal CMS Admin',
            'path' => '/admin',
        ],
        'users' => [
            [
                'title' => 'Пользователи',
                'path' => '/admin/users',
            ],
        ],
        'articles' => [
            [
                'title' => 'Категории',
                'path' => '/admin/categories',
            ],
            [
                'title' => 'Публикации',
                'path' => '/admin/articles',
            ],
        ],
        'comments' => [
            [
                'title' => 'Комментарии',
                'path' => '/admin/comments',
            ],
        ],
        'static_pages' => [
            'title' => 'Статические страницы',
            'path' => '/admin/pages',
        ],
    ],
];
