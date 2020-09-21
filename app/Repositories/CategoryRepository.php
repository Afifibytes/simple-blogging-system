<?php


namespace App\Repositories;


use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository extends BaseRepository
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function findArticlesByCategory(string $category)
    {
        return $this->model->where('label', $category)->firstOrFail()->articles;
    }

    public function create(array $attributes): Model
    {
        return;
    }
}
