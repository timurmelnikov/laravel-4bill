<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'login' => $this->faker->userName,
            'phone' => $this->faker->e164PhoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'date_of_birth' => $this->faker->dateTimeBetween(),
            'about' => $this->faker->text(),
            'type' => collect([User::TYPE_USER, User::TYPE_ADMIN])->random(),
            'email_verified_at' => now(),
            'password' => bcrypt('11111111'),
            'remember_token' => Str::random(10),
        ];
    }
}
