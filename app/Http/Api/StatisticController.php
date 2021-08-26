<?php

namespace App\Http\Api;

use App\Http\Requests\StatisticRequest;
use App\Jobs\CacheLike;
use App\Jobs\CacheView;
use App\Models\ArticleStatistic;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class StatisticController extends BaseController
{
    public function like(StatisticRequest $request): JsonResponse
    {
        $articleStatistic = ArticleStatistic::find($request->input('article_id'));

        if (null === $articleStatistic) {
            throw new HttpResponseException(
                response()->json('', JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
            );
        }

        CacheLike::dispatchAfterResponse($articleStatistic->article_id);

        return response()->json($articleStatistic->likes + 1);
    }

    public function view(StatisticRequest $request): JsonResponse
    {
        $articleStatistic = ArticleStatistic::find($request->input('article_id'));

        if (null === $articleStatistic) {
            throw new HttpResponseException(
                response()->json('', JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
            );
        }

        CacheView::dispatchAfterResponse($articleStatistic->article_id);

        return response()->json($articleStatistic->views + 1);
    }
}
