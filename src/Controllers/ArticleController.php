<?php

namespace App\Controllers;

use App\Config;
use App\Controller;
use App\Models\Article;
use App\Request;
use App\Service\Pagination;
use App\View\PaginationView;
use App\View\View;

class ArticleController extends Controller
{
    /**
     * Отображает главную страницу сайта
     *
     * @param Request $request - класс запроса переданного на эту страницу
     * @return View
     */
    public function index(Request $request): View
    {
        $pageNumber = empty(($request->getQuery())['page']) ?: ($request->getQuery())['page'];
        $paginator = new Pagination(
            new Article(),
            Config::getInstance()->get('pagination.limit'),
            new PaginationView(),
            $pageNumber
        );

        return new View('view.articles.index',
            [
                'title' => 'Статьи!!!',
                'paginator' => $paginator,
                'limit' => Config::getInstance()->get('pagination.limit'),
            ]);
    }

    public function article($id): View
    {
        $article = Article::find($id)
            ->get();
        return new View('view.articles.show', ['title' => 'Статьи!!!', 'article' => $article]);
    }
}
