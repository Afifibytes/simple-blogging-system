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
        if ($this->isValidRequest($request))
            $this->commentsRepository->create($request->input());

        return redirect(route('home'));
    }

    private function isValidRequest(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required',
        ]);

        if (!$validatedData)
            return false;

        return true;
    }
}
