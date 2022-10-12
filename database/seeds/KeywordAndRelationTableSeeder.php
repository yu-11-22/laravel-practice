<?php

use Illuminate\Database\Seeder;

class KeywordAndRelationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keyword')->insert([
            [
                'keyword' => 'java',
            ],
            [
                'keyword' => 'javascript',
            ],
            [
                'keyword' => 'php',
            ],
            [
                'keyword' => 'python',
            ],
            [
                'keyword' => 'sql',
            ],
            [
                'keyword' => 'ruby',
            ],
        ]);
        DB::table('relation')->insert([
            [
                'article_id' => rand(1, 7),
                'keyword_id' => rand(1, 6),
            ],
            [
                'article_id' => rand(1, 7),
                'keyword_id' => rand(1, 6),
            ],
            [
                'article_id' => rand(1, 7),
                'keyword_id' => rand(1, 6),
            ],
            [
                'article_id' => rand(1, 7),
                'keyword_id' => rand(1, 6),
            ],
            [
                'article_id' => rand(1, 7),
                'keyword_id' => rand(1, 6),
            ],
            [
                'article_id' => rand(1, 7),
                'keyword_id' => rand(1, 6),
            ],
        ]);
    }
}
