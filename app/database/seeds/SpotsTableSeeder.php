<?php

use Illuminate\Database\Seeder;

class SpotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('spots')->insert([
            'name'=>'サンプル１',
            'address'=>'サンプル１',
            'longitude'=>'100',
            'atitude'=>'100',
            'created_at'=>NULL,
            'updated_at'=>NULL,
        ]);
    }
}
