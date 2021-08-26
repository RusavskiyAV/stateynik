<?php

namespace App\Jobs;

use App\Services\CommentService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateComment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private int $article_id;
    private string $subject;
    private string $body;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $article_id, string $subject, string $body)
    {
        $this->article_id = $article_id;
        $this->subject = $subject;
        $this->body = $body;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CommentService $commentService)
    {
        sleep(600);
        $commentService->create($this->article_id, $this->subject, $this->body);
    }
}
