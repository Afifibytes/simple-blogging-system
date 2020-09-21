<?php


namespace App\Http\Controllers;

use App\Repositories\ArticlesRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ArticlesController extends BaseController
{
    /**
     * @var ArticlesRepository
     */
    protected $articlesRepository;

    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    public function __construct(ArticlesRepository $articlesRepository, CategoryRepository $categoryRepository)
    {
        $this->articlesRepository = $articlesRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function new()
    {
        $categories = $this->categoryRepository->all();

        return view('addArticle', ['categories' => $categories]);
    }

    public function create(Request $request)
    {
        $this->articlesRepository->create($request->input());

        return redirect(route('home'));
    }
}
