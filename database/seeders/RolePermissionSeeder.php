<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Criação das permissões
        $permissions = [
            'manage products',
            'manage orders',
            'view products',
            'place orders',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Criação da role Admin com permissões
        $adminRole = Role::create(['name' => 'Admin']);
        $adminRole->givePermissionTo(['manage products', 'manage orders', 'view products']);

        // Criação da role Cliente com permissões
        $clientRole = Role::create(['name' => 'Cliente']);
        $clientRole->givePermissionTo(['view products', 'place orders']);
    }
}
