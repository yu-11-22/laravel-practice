<?php
/*
 * @Author: yu-11-22 willy24692485@gmail.com
 * @Date: 2022-10-04 11:07:26
 * @LastEditors: yu-11-22 willy24692485@gmail.com
 * @LastEditTime: 2022-10-04 11:24:55
 * @FilePath: \second-laravel\database\seeds\PaperTableSeeder.php
 * @Description: 这是默认设置,请设置`customMade`, 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 */

use Illuminate\Database\Seeder;

class PaperTableSeeder extends Seeder
{
    /**
     * 新增測試數據
     *
     * @return void
     */
    public function run()
    {
        // 定義數據
        $data = [
            [
                'paper_name' =>  '學測試卷',
                'start_time' =>  strtotime('+7 days'),
                'duration' => 1,
            ],
            [
                'paper_name' =>  '國考試卷',
                'start_time' =>  strtotime('+10 days'),
                'duration' => 2,
            ],
            [
                'paper_name' =>  '會考試卷',
                'start_time' =>  strtotime('+14 days'),
                'duration' => 1,
            ],
            ];
        // 建議使用DB,因為不用引入
        DB::table('paper')->insert($data);
    }
}
