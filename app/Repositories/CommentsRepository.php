<?php


namespace App\Repositories;


use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;

class CommentsRepository extends BaseRepository
{
    public function __construct(Comment $model)
    {
        parent::__construct($model);
    }

    public function create(array $attributes): Model
    {
        $this->model->content = $attributes['content'];
        $this->model->user_id = $attributes['user'];
        $this->model->article_id = $attributes['article'];

        $this->model->save();

        return $this->model;
    }
}
