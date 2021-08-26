<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleStatisticTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_statistic', function (Blueprint $table) {
            $table
                ->foreignId('article_id')
                ->constrained('articles')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('views');
            $table->unsignedBigInteger('likes');

            $table->primary('article_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_statistic');
    }
}
