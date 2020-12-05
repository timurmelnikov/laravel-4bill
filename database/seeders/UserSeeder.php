<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Root',
            'login' => 'root',
            'phone' => '102',
            'email' => 'root@root.ua',
            'date_of_birth' => Carbon::now(),
            'about' => 'Я супер администратор! Мне можно все!',
            'type' => User::TYPE_ADMIN,
            'password' => bcrypt('11111111'),
        ]);

        User::factory()->count(10)->create();
    }
}
