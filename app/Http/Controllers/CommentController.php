<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Category;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CommentController extends Controller
{
    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $comments = Comment::select('id', 'text', 'creation_date', 'publishing_date', 'published', 'content_id', 'user_id')->orderBy('id', 'DESC')->paginate(10);
        return $this->validResponse($comments);
    }

    public function read($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->content = $comment->content()->select('title', 'alias')->get();
        return $this->validResponse($comment);
    }

    public function create(Request $request)
    {
        $rules = [
            'text' => 'required|max:500',
            'creation_date' => 'required|max:180',
            'publishing_date' => 'required|max:180',
            'published' => 'required|boolean',
        ];
        $this->validate($request, $rules);

        $data = $request->all();
        $data['created_by'] = 'system';

        $comment = Comment::create($data);

        return $this->successResponse($comment, Response::HTTP_CREATED);
    }

    public function update($id, Request $request)
    {
        $rules = [
            'text' => 'required|max:500',
            'creation_date' => 'required|max:180',
            'publishing_date' => 'required|max:180',
            'published' => 'required|boolean'
        ];
        $this->validate($request, $rules);

        $data = $request->all();

        $comment = Comment::findOrFail($id);

        $comment->fill($data);
        $comment->save();

        return $this->successResponse($comment, Response::HTTP_OK);
    }

    public function patch($id, Request $request)
    {
        // $rules = [
        //     'text' => 'required|max:500',
        //     'creation_date' => 'required|max:180',
        //     'publishing_date' => 'required|max:180',
        //     'published' => 'required|boolean'
        // ];
        // $this->validate($request, $rules);

        $comment = Comment::findOrFail($id);

        $data = $request->all();

        $data['updated_by'] = 'system';

        $comment->fill($data);
        $comment->save();

        return $this->successResponse($comment, Response::HTTP_OK);
    }

    public function delete($id)
    {
        $comment = Comment::findOrFail($id);

        $comment->delete();
        return $this->successResponse($comment, Response::HTTP_OK);
    }
}
