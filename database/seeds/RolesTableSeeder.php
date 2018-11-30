<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create role admin
        Role::create([
            'name' => 'admin',
            'description' => 'the god of the entire system'
        ]);

        // create role customer
        Role::create([
            'name' => 'customer',
            'description' => 'They`ll only have limited access'
        ]);
    }
}
