<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name = 'admin Name';
        $admin->email = 'letsread76@gmail.com';
        $admin->password = bcrypt('Letsread2019');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
