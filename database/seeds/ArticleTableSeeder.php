<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->truncate();

        //fill fake articles
        $faker = Faker\Factory::create();
        $articles = [];
        for ($i = 0; $i < 100; $i++) {
            $categoryId = ($i % 5) + 1;
            $userId = 1;
            $iconImage = 'default-' . ($i % 2) . '.png';
            $title = $faker->sentence;
            $slug = str_slug($title);
            $excerpt = $faker->realText(500);
            $content = $faker->realText(5000);
            $status = $i % 2;
            $created_at = Carbon::now();
            $updated_at = $i % 5 ? null : Carbon::now();
            $deleted_at = $i % 5 ? null : Carbon::now();

            $articles[] = [
                'category_id' => $categoryId,
                'user_id' => $userId,
                'icon_image' => $iconImage,
                'title' => $title,
                'slug' => $slug,
                'excerpt' => $excerpt,
                'content' => $content,
                'status' => $status,
                'created_at' => $created_at,
                'updated_at' => $updated_at,
                'deleted_at' => $deleted_at,
            ];
        }

        DB::table('articles')->insert($articles);
    }
}
