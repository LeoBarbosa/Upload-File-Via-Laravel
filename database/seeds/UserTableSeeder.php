<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = DB::table('users')->insert([
            'name' => 'master',
            'email' => 'leonardo.b.oliveira@outlook.com.br',
            'password' => bcrypt('secretpass'),
            'type' => 'administrator'
        ]);

        $user = User::find($id);
        $user->assignRole($user->type);

    }
}
