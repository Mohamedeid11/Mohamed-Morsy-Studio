<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();



        $adminRole = Role::where('name' , 'admin')->first();
        $userRole = Role::where('name' , 'user')->first();



        $admin = User::create([
            'name'  => 'Mohamed Morsy',
            'email' => 'admin@morsyStudio.com',
            'password' => Hash::make('123456789')
        ]);


        $user = User::create([
            'name'  => 'User',
            'email' => 'user@morsyStudio.com',
            'password' => Hash::make('123456789')
        ]);

        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
    }
}
