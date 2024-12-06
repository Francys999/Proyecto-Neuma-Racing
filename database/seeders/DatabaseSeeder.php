<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Francis Gabriel Adriano',
            'last_name' => 'Pomasoncco Martinez',
            'document_type' => '1',
            'document_number' => '74833560',
            'email' => 'francis11444@gmail.com',
            'phone' => '973273406',
            "password" => bcrypt("tecsup2024")
        ]);

        User::factory()->create([
            'name' => 'Franco Alexander',
            'last_name' => 'Cabello Huarcaya',
            'document_type' => '1',
            'document_number' => '73233467',
            'email' => 'franco_alex_07@hotmail.com',
            'phone' => '992656332',
            "password" => bcrypt("tecsup2024")
        ]);

        User::factory(20)->create();


        $this->call(CategorySeeder::class);

        $this->call([ProductSeeder::class]);

        $this->call([OptionSeeder::class]);

        $this->call([PermissionSeeder::class]);

        $this->call([RoleSeeder::class]);
    }
}
