<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $category = $request->get('category');
        $categories = Category::all();

        if ($category) {
            $articles = Category::where('label', $category)->firstOrFail()->articles;
        } else {
            $articles = Article::orderBy('published_at', 'desc')->get();
        }

        return view('home', [
            'articles'   => $articles,
            'categories' => $categories
        ]);
    }

}
