<?php
namespace App;

use Illuminate\Support\Facades\App;
use App\View\View;

class Controller
{
    public function index()
    {
        $books = \App\Model\Book::all();
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
        return \App\Model\Book::all();
    }
}
