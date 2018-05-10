<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'label' => 'draft'
        ]);

        DB::table('statuses')->insert([
            'label' => 'published'
        ]);

        DB::table('statuses')->insert([
            'label' => 'deletedww'
        ]);


    }
}
