<?php


namespace App\Http\Controllers;


use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ArticlesController extends BaseController
{
    public function new()
    {
        $categories = Category::all();

        return view('addArticle', ['categories' => $categories]);
    }

    public function save(Request $request)
    {
        $article = new Article;
        $article->title = $request->get('title');
        $article->body  = $request->get('body');
        $article->save();

        $article->categories()->attach($request->get('categories'));

        return redirect(route('home'));
    }
}
