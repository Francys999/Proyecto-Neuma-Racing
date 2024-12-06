<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Permission as ModelsPermission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'access dashboard',
            'manage options',
            'manage categories',
            'manage products',
            'manage covers',
            'manage drivers',
            'manage orders',
            'manage shipments',
        ];

        foreach ($permissions as $permission) {
            ModelsPermission::create([
                'name' => $permission,
            ]);
        }
    }
}
