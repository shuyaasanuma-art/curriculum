<?php

use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('likes')->insert([
            'post_id'=>1,
            'user_id'=>1,
            'created_at'=>NULL,
            'updated_at'=>NULL,
        ]);
    }
}
