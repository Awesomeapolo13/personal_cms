<?php

namespace App\Controllers;

use App\Config;
use App\Controller;
use \App\Models\Article;
use App\Pagination;
use App\View\View;

class ArticleController extends Controller
{
    public function index(int $pageNumber = 1): View
    {
        $articlesList = Article::all();
        $pagination = (new Pagination($articlesList, $pageNumber))->paginate();
        $pagesCount = ceil($articlesList->count() / Config::getInstance()->get('pagination.limit'));
        //ToDO перенести расчеты страниц из контроллера в класс пагинации
        $nextPage = $pageNumber >= $pagesCount ? $pagesCount : ++$pageNumber;
        $previousPage = $pageNumber <= 0 ? 1 : --$pageNumber;
//        dd($pagination);
        return new View('view.articles.index',
            [
                'title' => 'Статьи!!!',
                'articlesList' => $pagination,
                'limit' => Config::getInstance()->get('pagination.limit'),
                'fullCount' => $articlesList->count(),
                'pagesCount' => $pagesCount,
                'nextPage' => $nextPage,
                'previousPage' => $previousPage,
            ]);
    }

    public function article($id): View
    {
        $article = Article::find($id)
            ->get();
        return new View('view.articles.show', ['title' => 'Статьи!!!', 'article' => $article]);
    }
}
