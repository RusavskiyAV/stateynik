<?php

namespace App\Http\Controllers;

use App\Fetchers\ArticleFetcher;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends BaseController
{
    /**
     * @var int
     */
    private const PER_PAGE = 10;

    public function index(ArticleFetcher $fetcher)
    {
        return view('pages.articles', [
            'articles' => $fetcher->getLatestMiniPaginated(self::PER_PAGE),
        ]);
    }

    public function view(string $slug, ArticleFetcher $articleFetcher)
    {
        $article = $articleFetcher->getView($slug);

        if (null === $article) {
            abort(Response::HTTP_NOT_FOUND);
        }

        return view('pages.article', [
            'article' => $article,
        ]);
    }
}
