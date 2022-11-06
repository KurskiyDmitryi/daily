<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::create(['name' => 'view']);
        $permission = Permission::create(['name' => 'add']);
        $permission = Permission::create(['name' => 'edit']);
        $permission = Permission::create(['name' => 'delete']);
    }
}
