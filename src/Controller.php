<?php
namespace App;

use Illuminate\Support\Facades\App;
use App\View\View;
use App\Exception\BadMethodCallException;

class Controller
{
    public function index()
    {
        $books = \App\Models\Book::all();
        return new View('view.index', ['title' => 'Home', 'books' => $books]);
    }

    public function controller()
    {
        echo 'From App\\Controller';
    }

    public function about2()
    {
        echo "<h1>About2</h1>";
    }

    public function getBooks()
    {
        return \App\Models\Book::all();
    }

    public function articles()
    {
        return new View('view.articles.index', []);
    }

    public function __call($method, $parameters)
    {
        throw new BadMethodCallException(sprintf(
            'Method %s::%s does not exist.', static::class, $method
        ));
    }
}
