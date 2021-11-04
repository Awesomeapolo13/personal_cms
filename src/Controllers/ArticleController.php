<?php

namespace App\Controllers;

use App\Config;
use App\Controller;
use \App\Models\Article;
use App\Service\Pagination;
use App\View\View;

class ArticleController extends Controller
{
    public function index(int $pageNumber = 1): View
    {
        $articlesList = Article::all();
        $paginator = new Pagination($articlesList, $pageNumber);

        return new View('view.articles.index',
            [
                'title' => 'Статьи!!!',
                'articlesList' => $paginator->paginate(),
                'limit' => Config::getInstance()->get('pagination.limit'),
                'fullCount' => $articlesList->count(),
                'pagesCount' => $paginator->calculatePagesCount(),
                'nextPage' => $paginator->calculateNextPage(),
                'previousPage' => $paginator->calculatePreviousPage(),
            ]);
    }

    public function article($id): View
    {
        $article = Article::find($id)
            ->get();
        return new View('view.articles.show', ['title' => 'Статьи!!!', 'article' => $article]);
    }
}
