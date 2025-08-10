<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;

class ModuleSeeder extends Seeder
{
    public function run()
    {
        $modules = [
            ['name' => 'dashboard', 'description' => 'Admin Dashboard Home'],
            ['name' => 'products', 'description' => 'Manage Products'],
            ['name' => 'categories', 'description' => 'Manage Categories'],
            ['name' => 'orders', 'description' => 'Manage Orders'],
            ['name' => 'inventory', 'description' => 'Manage Inventory'],
            ['name' => 'reports', 'description' => 'View Reports'],
            ['name' => 'users', 'description' => 'User Management'],
            ['name' => 'messages', 'description' => 'Contact Messages'],
            ['name' => 'careers', 'description' => 'Career Applications'],
            ['name' => 'backup', 'description' => 'System Backup'],
        ];

        foreach ($modules as $module) {
            Module::updateOrCreate(['name' => $module['name']], $module);
        }
    }
}
