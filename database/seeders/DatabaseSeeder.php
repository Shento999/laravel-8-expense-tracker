<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Adnan',
            'email' => 'adnan@gmail.com',
            'password' => Hash::make('saeed12345'),
        ]);

        $this->call([
            ExpenseSeeder::class,
        ]);
        
    }
}