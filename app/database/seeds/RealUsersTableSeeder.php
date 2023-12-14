<?php

use Illuminate\Database\Seeder;

class RealUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('real_users')->insert([
            'name'=>'サンプル１',
            'email'=>'sanpuru1',
            'password'=>'サンプル１',
            'image'=>'rei',
            'profile'=>'サンプル１',
            'role'=>1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
    }
}
