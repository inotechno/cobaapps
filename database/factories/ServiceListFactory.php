<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceList>
 */
class ServiceListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $me = 1;
        return [

            'id' => $me++,
            'service_id' => $this->faker->bothify('??-###'),
            'service_name'=> $this->faker->text(10),
            'service_endpoint_esb'=> $this->faker->url(),
            'service_endpoint_msr'=> $this->faker->url(),
            'service_desc'=> $this->faker->sentence(10),
            'service_postman' => $this->faker->paragraph(100),
            'user_id' => User::factory(),



        ];
    }
}
