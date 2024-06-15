<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $super=User::create([
            'name'=>'Brian Super Admin',
            'email'=>'brianomondi605@gmail.com',
            'password'=>\Hash::make('Brian605'),
        ]);
        $super->assignRole('SuperAdmin');
    }
}
