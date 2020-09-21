<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Repositories\ArticlesRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * @var ArticlesRepository
     */
    protected $articlesRepository;

    /**
     * Create a new controller instance.
     *
     * @param CategoryRepository $categoryRepository
     * @param ArticlesRepository $articlesRepository
     */
    public function __construct(CategoryRepository $categoryRepository, ArticlesRepository $articlesRepository)
    {
        $this->middleware('auth');
        $this->categoryRepository = $categoryRepository;
        $this->articlesRepository = $articlesRepository;
    }

    public function index(Request $request)
    {
        $category   = $request->get('category');
        $categories = $this->categoryRepository->all();

        if ($category) {
            $articles = $this->categoryRepository->findArticlesByCategory($category);
        } else {
            $articles = $this->articlesRepository->getArticlesOrderedByPublishedDate();
        }

        return view('home', [
            'articles'   => $articles,
            'categories' => $categories
        ]);
    }

}
