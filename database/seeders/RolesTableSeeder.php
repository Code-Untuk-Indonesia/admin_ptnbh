<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage roles']);
        Permission::create(['name' => 'manage berita']);
        Permission::create(['name' => 'manage galeri']);
        Permission::create(['name' => 'manage pengumuman']);
        Permission::create(['name' => 'manage agenda']);
        Permission::create(['name' => 'manage album']);
        Permission::create(['name' => 'manage tentang']);
        Permission::create(['name' => 'manage video']);
        Permission::create(['name' => 'manage unduh']);
        Permission::create(['name' => 'manage organisasi']);
        Permission::create(['name' => 'manage home']);
        Permission::create(['name' => 'manage footer']);
    }
}
