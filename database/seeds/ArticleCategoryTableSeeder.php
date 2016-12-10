<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ArticleCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_categories')->truncate();

        //fill article_categories
        $categories = [
            ['label' => 'uncategory', 'slug' => 'game', 'order' => 1, 'created_at' => Carbon::now()],
            ['label' => 'game', 'slug' => 'game', 'order' => 2, 'created_at' => Carbon::now()],
            ['label' => 'phone', 'slug' => 'phone', 'order' => 3, 'created_at' => Carbon::now()],
            ['label' => 'software', 'slug' => 'software', 'order' => 4, 'created_at' => Carbon::now()],
            ['label' => 'hardware', 'slug' => 'hardware', 'order' => 5, 'created_at' => Carbon::now()],
        ];

        DB::table('article_categories')->insert($categories);
    }
}
