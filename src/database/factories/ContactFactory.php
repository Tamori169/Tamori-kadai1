<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'gender' => $this->faker->randomElement([1,2,3]),
            'email' => $this->faker->unique()->safeEmail(),
            'tel' => preg_replace('/[^0-9]/', '', $this->faker->phoneNumber()), 
            'address' =>
                    $this->faker->prefecture() .
                    $this->faker->city() .
                    $this->faker->streetAddress(),
            'building' => $this->faker->secondaryAddress(),
            'detail' => implode("\n", $this->faker->paragraphs(3)),
        ];
    }
}
