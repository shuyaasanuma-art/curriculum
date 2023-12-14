<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'user_id'=>1,
            'spot_id'=>1,
            'title'=>'サンプル１',
            'date'=>'2023-12-14',
            'image'=>'rei',
            'episode'=>'sample1',
            'evolution'=>3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
