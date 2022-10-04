<?php
/*
 * @Author: yu-11-22 willy24692485@gmail.com
 * @Date: 2022-09-30 14:51:29
 * @LastEditors: yu-11-22 willy24692485@gmail.com
 * @LastEditTime: 2022-09-30 14:52:46
 * @FilePath: \second-laravel\app\Member.php
 * @Description: 这是默认设置,请设置`customMade`, 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    // 定義模型關聯的數據表(一個模型只對應一個表，必填)
    protected $table = 'member';
    // 定義主鍵，如果表中的主鍵為id，可以不填
    protected $primaryKey = 'id';
    // 若不為false，默認操作表中時間欄位，且欄位名為created_at、updated_at
    public $timestamps = false;
    // 設置允許寫入數據的字段，可以不填
    protected $fillable = ['id', 'name', 'age', 'email', 'avatar'];
}
