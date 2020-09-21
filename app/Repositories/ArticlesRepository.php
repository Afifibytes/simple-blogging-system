<?php


namespace App\Repositories;


use App\Models\Article;
use Illuminate\Database\Eloquent\Model;

class ArticlesRepository extends BaseRepository
{
    public function __construct(Article $model)
    {
        parent::__construct($model);
    }

    /**
     * @return mixed
     */
    public function getArticlesOrderedByPublishedDate()
    {
        return $this->model->orderBy('published_at', 'desc')->get();
    }

    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model
    {
        $this->model->title = $attributes['title'];
        $this->model->body  = $attributes['body'];
        $this->model->save();

        $this->model->categories()->attach($attributes['categories']);

        return $this->model;
    }

}
