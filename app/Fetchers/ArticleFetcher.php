<?php

namespace App\Fetchers;

use App\Models\Article;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class ArticleFetcher
{
    public function getLatestMini(int $limit): Collection
    {
        return Article::select('title', 'description', 'slug')->orderBy('created_at', 'DESC')->limit($limit)->get();
    }

    public function getLatestMiniPaginated(int $per_page): Paginator
    {
        return Article::select('title', 'description', 'slug')->orderBy('created_at', 'DESC')->paginate($per_page);
    }

    public function getView(string $slug): ?Article
    {
        return Article::Where('slug', $slug)->with(['statistic', 'tags'])->first();
    }
}
