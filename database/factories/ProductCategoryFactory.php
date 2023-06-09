<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\ProductCategory>
 */
class ProductCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $last_id = 0;

        return [
            "code" => 'PRO_CAT_' . $last_id + 1,
            "name" => $this->faker->name(),
            "slug" => $this->faker->name(),
        ];
    }
}
