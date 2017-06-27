<?php

use Illuminate\Database\Seeder;
use Kodeine\Acl\Models\Eloquent\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = new Role();
        $roleAdmin->name = 'Administrator';
        $roleAdmin->slug = 'administrator';
        $roleAdmin->description = 'manage administration privileges';
        $roleAdmin->save();

        $roleUser = new Role();
        $roleUser->name = 'User';
        $roleUser->slug = 'user';
        $roleUser->description = 'manage user privileges';
        $roleUser->save();
    }

}
