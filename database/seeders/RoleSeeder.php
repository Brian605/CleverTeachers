<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Role::create(['name' => 'SuperAdmin']);
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Staff']);
        Role::create(['name' => 'Lecturer']);
        Role::create(['name' => 'Student']);
        Role::create(['name' => 'ClassRep']);
        Role::create(['name' => 'Secretary']);
        Role::create(['name' => 'Accountant']);
        Role::create(['name' => 'Registrar']);
        Role::create(['name' => 'Procurement']);
        Role::create(['name' => 'Chancellor']);
        Role::create(['name' => 'Dean']);
    }
}
