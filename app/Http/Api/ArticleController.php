<?php

namespace App\Http\Api;

use App\Http\Requests\CommentRequest;
use App\Jobs\CreateComment;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class ArticleController extends BaseController
{
    public function comment(CommentRequest $request): JsonResponse
    {
        CreateComment::dispatch(
            $request->input('article_id'),
            $request->input('subject'),
            $request->input('body')
        )->onQueue('comment');

        return response()->json('', JsonResponse::HTTP_CREATED);
    }
}
