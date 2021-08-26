<?php

namespace App\Http\Controllers;

use App\Fetchers\ArticleFetcher;
use Illuminate\Routing\Controller as BaseController;

class IndexController extends BaseController
{
    /**
     * @var int
     */
    private const ARTICLE_LIMIT = 6;

    public function index(ArticleFetcher $fetcher)
    {
        return view('pages.index', [
            'articles' => $fetcher->getLatestMini(self::ARTICLE_LIMIT),
        ]);
    }
}
