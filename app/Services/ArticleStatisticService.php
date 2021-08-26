<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ArticleStatisticService
{
    /**
     * @var string
     */
    public const LIKE_CACHE_KEY = 'article_statistic.likes';
    /**
     * @var string
     */
    public const VIEW_CACHE_KEY = 'article_statistic.view';

    public function cacheLike(int $article_id): void
    {
        $this->cache(self::LIKE_CACHE_KEY, $article_id);
    }

    public function cacheView(int $article_id): void
    {
        $this->cache(self::VIEW_CACHE_KEY, $article_id);
    }

    private function cache(string $key, int $article_id): void
    {
        Cache::lock($key)->get(function () use ($key, $article_id) {
            if (Cache::has($key)) {
                $cache = Cache::get($key);
                $cache[$article_id] = ($cache[$article_id] ?? 0) + 1;
                Cache::put($key, $cache);
            } else {
                Cache::put($key, [$article_id => 1]);
            }
        });
    }

    public function applyCache(): void
    {
        foreach ($this->getCache(self::LIKE_CACHE_KEY) as $key => $value) {
            DB::statement(
                'UPDATE article_statistic SET likes = likes + :count WHERE article_id = :article_id',
                [
                    'count' => $value,
                    'article_id' => $key,
                ]
            );
        }

        foreach ($this->getCache(self::VIEW_CACHE_KEY) as $key => $value) {
            DB::statement(
                'UPDATE article_statistic SET views = views + :count WHERE article_id = :article_id',
                [
                    'count' => $value,
                    'article_id' => $key,
                ]
            );
        }
    }

    private function getCache(string $key): array
    {
        $cache = [];

        Cache::lock($key)->get(function () use (&$cache, $key) {
            if (!Cache::has($key)) {
                return;
            }

            $cache = Cache::get($key);
            Cache::forget($key);
        });

        return $cache;
    }
}
