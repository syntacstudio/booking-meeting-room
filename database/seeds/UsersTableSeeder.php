<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get role admin
        $role_admin = Role::where('name', 'admin')->first();
        $role_user  = Role::where('name', 'user')->first();

        $admin = new User();
        $admin->name = 'Administrator Sample';
        $admin->email = 'admin@test.app';
        $admin->email_verified_at = Carbon::now();
        $admin->password = bcrypt('secret');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'User Sample';
        $user->email = 'user@test.app';
        $user->email_verified_at = Carbon::now();
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_user);
    }
}
