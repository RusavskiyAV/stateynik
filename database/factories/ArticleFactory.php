<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $body = $this->faker->text(1000);
        $description = mb_substr($body, 0, 100);
        $title = $this->faker->sentence();
        $slug = Str::slug($title);

        return [
            'title' => $title,
            'description' => $description,
            'body' => $body,
            'slug' => $slug,
            'created_at' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
        ];
    }
}
