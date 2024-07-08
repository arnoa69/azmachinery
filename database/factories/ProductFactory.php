<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
Use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'operation' => $this->faker->word,
            'product_image' => $this->faker->imageUrl(),
            'product_name' => $this->faker->sentence,
            'product_code' => $this->faker->numberBetween(100, 1000),
            'product_price' => $this->faker->randomFloat(2, 10, 1000),
            'type' => $this->faker->word,
            'usage' => $this->faker->sentence,
            'weight_capacity' => $this->faker->numberBetween(100, 1000),
            'slug' => $this->faker->unique()->slug,
            'slug_de' => $this->faker->unique()->slug,
            'slug_dk' => $this->faker->unique()->slug,
            'slug_ee' => $this->faker->unique()->slug,
            'slug_es' => $this->faker->unique()->slug,
            'slug_fi' => $this->faker->unique()->slug,
            'slug_fr' => $this->faker->unique()->slug,
            'slug_it' => $this->faker->unique()->slug,
            'slug_lu' => $this->faker->unique()->slug,
            'slug_ne' => $this->faker->unique()->slug,
            'slug_no' => $this->faker->unique()->slug,
            'slug_pt' => $this->faker->unique()->slug,
            'slug_se' => $this->faker->unique()->slug,
            'total_length' => $this->faker->numberBetween(1, 100),
            'total_width' => $this->faker->numberBetween(1, 100),
            'width_used' => $this->faker->numberBetween(1, 100),
            'length_inclined_plane' => $this->faker->numberBetween(1, 100),
            'length_plateform_horizontal' => $this->faker->numberBetween(1, 100),
            'length_lip_penetrating' => $this->faker->numberBetween(1, 100),
            'entrance_tray_length' => $this->faker->numberBetween(100, 900),
            'exit_lip_length' => $this->faker->numberBetween(10, 900),
            'slope_min' => $this->faker->numberBetween(1, 100),
            'slope_max' => $this->faker->numberBetween(1, 100),
            'unloaded_weight' => $this->faker->numberBetween(2500, 3500),
            'min_height' => $this->faker->numberBetween(1, 100),
            'max_height' => $this->faker->numberBetween(1, 100),
            'hydraulic_leveler' => $this->faker->boolean(),
            'amount_feet' => $this->faker->numberBetween(4, 10),
            'electric_leveler' => $this->faker->boolean(),
            'side_railings_height' => $this->faker->numberBetween(1, 100),
            'application' => ['forklift_operator' => 1],
        ];
    }
}
