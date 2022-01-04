<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Link;
use App\Models\User;
use Illuminate\Support\Str;

class LinkFactory extends Factory
{

    protected $model = Link::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => $this->faker->url(),
            'slug' => Str::random(6),
        ];
    }
}
