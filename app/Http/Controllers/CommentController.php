<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Repositories\CommentsRepository;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * @var CommentsRepository
     */
    protected $commentsRepository;

    /**
     * CommentController constructor.
     * @param CommentsRepository $commentsRepository
     */
    public function __construct(CommentsRepository $commentsRepository)
    {
        $this->commentsRepository = $commentsRepository;
    }

    public function create(Request $request)
    {
        $this->commentsRepository->create($request->input());

        return redirect(route('home'));
    }
}
