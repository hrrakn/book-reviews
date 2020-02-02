<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => '新刊書店',
                'slug' => 'shinkan',
            ],
            [
                'name' => '古書店',
                'slug' => 'kosho',
            ],
            [
                'name' => 'ブックカフェ',
                'slug' => 'bookcafe',
            ],
        ]);
    }
}
