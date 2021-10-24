<?php


namespace App\Controllers;


use App\Controller;
use \App\Models\Article as ArticleModel;
use App\View\View;

class ArticleController extends Controller
{
    public function index()
    {
        $articlesList = ArticleModel::all();
        return new View('view.articles.index', ['title' => 'Статьи!!!', 'articlesList' => $articlesList]);
    }

    public function article($id)
    {
        $article = ArticleModel::find($id)
            ->get();
//        echo "<pre>";
//        var_dump($article);
//        echo "</pre>";
        return new View('view.articles.show', ['title' => 'Статьи!!!', 'article' => $article]);
    }
}