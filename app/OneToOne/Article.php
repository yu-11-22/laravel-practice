<?php

namespace App\OneToOne;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // 定義模型關聯的數據表(一個模型只對應一個表，必填)
    protected $table = 'article';
    // 若為false，禁用表中時間欄位，且欄位名為created_at、updated_at
    public $timestamps = false;

    // 模型關聯操作，關聯 author 表，一對一關聯
    public function author()
    {
        return $this->hasOne('App\OneToOne\Author', 'id', 'author_id');
    }
    // 模型關聯操作，關聯 comment 表，一對多關聯
    public function comment()
    {
        return $this->hasMany('App\OneToAll\Comment', 'article_id', 'id');
    }

        // 模型關聯操作，關聯 keyword 表，多對多關聯
        public function keyword()
        {
            return $this->belongsToMany('App\AllToAll\Keyword', 'relation', 'article_id', 'keyword_id');
        }
}
