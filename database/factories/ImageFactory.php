<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // https://foodish-api.herokuapp.com/api/images/burge
        return [
            'path' => Http::get('https://foodish-api.herokuapp.com/api/images/burger')->json()['image'],
            'product_id' => '1',
        ];
    }
}
