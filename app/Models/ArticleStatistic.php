<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ArticleStatistic extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'article_statistic';
    /**
     * @var string
     */
    protected $primaryKey = 'article_id';

    /**
     * @var bool
     */
    public $timestamps = false;
}
