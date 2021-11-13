<?php

use function DI\create;
use App\Request;
use App\Models\Article;
//Пагинация
use App\PaginationInterface;
use App\PaginationImplementationInterface;
use App\Service\Pagination;
use App\View\PaginationView;

return [
    Request::class => Request::createFromGlobals(),

    // Модели
    Article::class => create(Article::class),

    //Пагинация
    PaginationInterface::class => create(Pagination::class),
    PaginationImplementationInterface::class => create(PaginationView::class),
];
