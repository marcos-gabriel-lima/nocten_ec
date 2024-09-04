<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Primeiro, rode o RolePermissionSeeder para criar as roles e permissões
        $this->call(RolePermissionSeeder::class);

        // Criar um usuário Admin e atribuir a role Admin
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);

        $adminRole = Role::findByName('Admin');
        $admin->assignRole($adminRole);

        // Criar um usuário Cliente e atribuir a role Cliente
        $client = User::factory()->create([
            'name' => 'Client User',
            'email' => 'client@example.com',
        ]);

        $clientRole = Role::findByName('Cliente');
        $client->assignRole($clientRole);
    }
}
