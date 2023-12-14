<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'サンプル１',
            'email'=>'test@email.com',
            'password'=>'サンプル１',
            'image'=>'rei',
            'profile'=>'サンプル１',
            'role'=>1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
    }
}
