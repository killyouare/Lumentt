<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $limit = $this->command->ask('Please enter the limit for creating');

        User::factory()->create([
            'email' => 'admin',
            'password' => Hash::make('admin'),
            'is_admin' => true
        ]);

        User::factory()->create([
            'email' => 'user',
            'password' => Hash::make('user'),
        ]);
        User::factory($limit)->create();
    }
}
