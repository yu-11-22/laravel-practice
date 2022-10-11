<?php

namespace App\OneToOne;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    // 定義模型關聯的數據表(一個模型只對應一個表，必填)
    protected $table = 'author';
    // 若為false，禁用表中時間欄位，且欄位名為created_at、updated_at
    public $timestamps = false;
}
