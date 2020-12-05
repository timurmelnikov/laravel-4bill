<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserRootSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return User::create([
            'name' => 'Root',
            'login' => 'root',
            'phone' => '102',
            'email' => 'root@root.ua',
            'date_of_birth' => Carbon::now(),
            'about' => 'Я супер администратор! Мне можно все!',
            'type' => User::TYPE_ADMIN,
            'password' => Hash::make('11111111'), //Пример учебный, поэтому и пароль открытым текстом :)
        ]);
    }
}
