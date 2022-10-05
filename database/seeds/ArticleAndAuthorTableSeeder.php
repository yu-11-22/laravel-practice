<?php
/*
 * @Author: yu-11-22 willy24692485@gmail.com
 * @Date: 2022-10-05 15:33:22
 * @LastEditors: yu-11-22 willy24692485@gmail.com
 * @LastEditTime: 2022-10-05 15:46:27
 * @FilePath: \second-laravel\database\seeds\ArticleAndAuthorTableSeeder.php
 * @Description: 这是默认设置,请设置`customMade`, 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 */

use Illuminate\Database\Seeder;

class ArticleAndAuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article')->insert([
            [
                'article_name' => '文章' . rand(1, 20),
                'author_id' => rand(1, 3),
            ],
            [
                'article_name' => '文章' . rand(1, 20),
                'author_id' => rand(1, 3),
            ],
            [
                'article_name' => '文章' . rand(1, 20),
                'author_id' => rand(1, 3),
            ],
            [
                'article_name' => '文章' . rand(1, 20),
                'author_id' => rand(1, 3),
            ],
            [
                'article_name' => '文章' . rand(1, 20),
                'author_id' => rand(1, 3),
            ],
            [
                'article_name' => '文章' . rand(1, 20),
                'author_id' => rand(1, 3),
            ],
        ]);
        DB::table('author')->insert([
            [
                'author_name' => '作者' . rand(1, 3)
            ],
            [
                'author_name' => '作者' . rand(1, 3)
            ],
            [
                'author_name' => '作者' . rand(1, 3)
            ],
        ]);
    }
}
