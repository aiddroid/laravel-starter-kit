<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->truncate();

        //fill fake comments
        $faker = Faker\Factory::create();
        $comments = [];
        for($i = 0; $i < 100; $i++) {
            $userId = $i % 2 + 1;
            $type = 1;
            $parentId = $i % 10 + 1;
            $content = $faker->sentence;
            $status = $i % 2;
            $createdAt = Carbon::now();

            $comments[] = [
                'user_id' => $userId,
                'type' => $type,
                'parent_id' => $parentId,
                'content' => $content,
                'status' => $status,
                'created_at' => $createdAt,
            ];
        }

        DB::table('comments')->insert($comments);
    }
}
