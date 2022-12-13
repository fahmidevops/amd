<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date_doc' => $this->faker->date(),
            'title' => $this->faker->sentence(mt_rand(2, 10)),
            'slug'  => $this->faker->slug(),
            'image' => $this->faker->sentence(mt_rand(2, 5)),
            'description' => $this->faker->sentence(mt_rand(2, 15)),
            'uploaded_at' => $this->faker->date(),
            'status' => 1,
            'user_id' => mt_rand(1, 5),
            'type_id' => mt_rand(1, 3)
        ];
    }
}
