<?php

namespace App\Controllers;

use App\Config;
use App\Controller;
use App\Models\Article;
use App\Request;
use App\Service\Pagination;
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
        $article = new Article();
        $articlesCount = $article->getFullCount();
        $paginator = new Pagination($article, Config::getInstance()->get('pagination.limit'), $pageNumber,);

        return new View('view.articles.index',
            [
                'title' => 'Статьи!!!',
                'paginator' => $paginator,
                'limit' => Config::getInstance()->get('pagination.limit'),
                'fullCount' => $articlesCount,
            ]);
    }

    public function article($id): View
    {
        $article = Article::find($id)
            ->get();
        return new View('view.articles.show', ['title' => 'Статьи!!!', 'article' => $article]);
    }
}
