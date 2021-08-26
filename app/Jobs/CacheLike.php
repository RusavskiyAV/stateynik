<?php

namespace App\Jobs;

use App\Services\ArticleStatisticService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CacheLike implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private int $article_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $article_id)
    {
        $this->article_id = $article_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ArticleStatisticService $articleStatisticService)
    {
        $articleStatisticService->cacheLike($this->article_id);
    }
}
