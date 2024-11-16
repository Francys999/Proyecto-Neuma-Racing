<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Francis Gabriel Adriano Pomasoncco Martinez',
            'email' => 'francis11444@gmail.com',
            "password" => bcrypt("tecsup2024")
        ]);

        User::factory()->create([
            'name' => 'Franco Cabello',
            'email' => 'franco_alex_07@hotmail.com',
            "password" => bcrypt("tecsup2024")
        ]);


        $this->call(CategorySeeder::class);

        $this->call([ProductSeeder::class]);

        $this->call([OptionSeeder::class]);
    }
}
