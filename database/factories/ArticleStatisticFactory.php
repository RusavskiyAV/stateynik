<?php

namespace Database\Factories;

use App\Models\ArticleStatistic;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleStatisticFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ArticleStatistic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'views' => 0,
            'likes' => 0,
        ];
    }
}
