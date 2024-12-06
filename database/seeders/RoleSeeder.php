<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Laravel\Jetstream\Rules\Role;
use Spatie\Permission\Models\Role as ModelsRole;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = ModelsRole::create([
            'name' => 'admin',
        ]);

        $admin->syncPermissions([
            'access dashboard',
            'manage options',
            'manage categories',
            'manage products',
            'manage covers',
            'manage drivers',
            'manage orders',
            'manage shipments',
        ]);

        $user = User::find(1);
        $user->assignRole('admin');

        $user = User::find(2);
        $user->assignRole('admin');

        $driver = ModelsRole::create([
            'name' => 'driver',
        ]);

        $driver->syncPermissions([
            'access dashboard',
            'manage shipments',
        ]);
        
    }
}
