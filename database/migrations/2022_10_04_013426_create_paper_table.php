<?php
/*
 * @Author: yu-11-22 willy24692485@gmail.com
 * @Date: 2022-10-04 09:34:26
 * @LastEditors: yu-11-22 willy24692485@gmail.com
 * @LastEditTime: 2022-10-04 10:12:55
 * @FilePath: \second-laravel\database\migrations\2022_10_04_013426_create_paper_table.php
 * @Description: 这是默认设置,请设置`customMade`, 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaperTable extends Migration
{
    /**
     * 創建數據表
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paper', function (Blueprint $table) {
            // 主鍵 id
            $table->increments('id');
            // 考卷名稱 varchar(100), not null, unique
            $table->string('paper_name', 100)->notNull()->unique();
            // 考卷總分 tinyint, 預設 100
            $table->tinyInteger('total_score')->default(100);
            // 開始考試時間 時間戳 int 允許為空
            $table->integer('start_time')->nullable();
            // 考卷時長,單位分鐘 tinyint
            $table->tinyInteger('duration');
            // 考卷是否啟用 tinyint 1啟用 2禁用 預設1
            $table->tinyInteger('status')->default(1);
            // 加時間
            $table->timestamps();
        });
    }

    /**
     * 刪除數據表(撤銷創建數據表)
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paper');
    }
}
