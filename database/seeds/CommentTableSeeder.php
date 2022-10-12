<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comment')->insert([
            [
                'comment' => '今晨最低溫17.2℃！周末注意秋颱「共伴效應」吳德榮曝3可能路徑',
                'article_id' => rand(1, 3),
            ],
            [
                'comment' => '中央氣象局觀測，今（12日）清晨全台最低溫出現在苗栗公館鄉的17.2度。今東北季風影響，台灣北部及東北部天氣較涼，中南部早晚天氣亦涼',
                'article_id' => rand(1, 3),
            ],
            [
                'comment' => '今明兩天基隆北海岸及東北部地區有雨，其中東北部地區並有局部大雨發生的機率',
                'article_id' => rand(1, 3),
            ],
            [
                'comment' => '桃園以北、東部、東南部地區及恆春半島有局部短暫雨，其他地區及澎湖、金門、馬祖為多雲到晴',
                'article_id' => rand(1, 3),
            ],
            [
                'comment' => '午後中南部山區有局部短暫陣雨。氣象專家吳德榮提醒',
                'article_id' => rand(1, 3),
            ],
            [
                'comment' => '西北太平洋有熱帶擾動發展成颱的機率，周六至下周一最靠近台灣。',
                'article_id' => rand(1, 3),
            ],
        ]);
    }
}
