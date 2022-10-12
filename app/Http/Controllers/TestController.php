<?php
/*
 * @Author: yu-11-22 willy24692485@gmail.com
 * @Date: 2022-09-20 13:39:43
 * @LastEditors: yu-11-22 willy24692485@gmail.com
 * @LastEditTime: 2022-10-11 17:27:10
 * @FilePath: \second-laravel\app\Http\Controllers\TestController.php
 * @Description: 这是默认设置,请设置`customMade`, 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 */

namespace App\Http\Controllers;

use App\Member;
use Session;
use Cache;
use DB;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * 表單自動驗證
     *
     * @param Request $request
     * @return void
     */
    public function autoVerify(Request $request)
    {
        // 請求方式
        // echo $request->method();
        if ($request->method() == 'POST') {
            $this->validate($request, [
                "name" => "required|min:2|max:20",
                "age" => "required|integer|min:1|max:100",
                "email" => "required|email",
            ]);
        } else {
            return view('form');
        }
    }

    /**
     * 上傳檔案功能
     *
     * @param Request $request
     * @return void
     */
    public function uploadfile(Request $request)
    {
        if ($request->method() == 'POST') {
            $this->validate($request, [
                "name" => "required|min:2|max:20",
                "age" => "required|integer|min:1|max:100",
                "email" => "required|email",
                'g-recaptcha-response' => 'required|captcha',
            ]);
            // 文件是否存在&&文件上傳過程是否出錯
            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                // 取得檔名
                // dd($request->file('avatar')->getClientOriginalName());
                // 取得副檔名
                // dd($request->file('avatar')->getClientOriginalExtension());
                // 上傳檔案其實就是移動文件的意思，將文件移動到新建立的資料夾，並用時間戳+隨機數字命名，再加上.附檔名
                $path = md5(time() . rand(100000, 999999)) . "." . $request->file('avatar')->getClientOriginalExtension();
                $request->file('avatar')->move('./uploads', $path);
                $data = $request->all();
                $data['avatar'] = './uploads/' . $path;
                $result = Member::create($data);
                if ($result) {
                    return redirect('/');
                }
            }
        } else {
            return view('uploadform');
        }
    }

    /**
     * 分頁功能
     *
     * @param Request $request
     * @return void
     */
    public function pagination(Request $request)
    {
        // 查詢數據
        // $data = Member::get();
        // 分頁方法，支持 where 方法
        $data = Member::paginate(1);
        // 展示視圖並且傳送數據
        return view('pagination', compact('data'));
    }

    /**
     * ajax 頁面展示
     *
     * @return void
     */
    public function ajaxblade()
    {
        return view('ajaxblade');
    }

    /**
     * ajax 響應測試
     *
     * @return void
     */
    public function ajaxtest()
    {
        $data = Member::get();
        // json 響應
        // return json_encode($data);
        // return response()->json($data);
        return $data;
    }

    /**
     * session 控制
     *
     * @return void
     */
    public function sessiontest()
    {
        // session 儲存變量鍵/值
        Session::put('name', '林小強');
        // session 獲取變量
        echo Session::get('name');
        // session 獲取變量, 不存在就返回默認值
        echo Session::get('gender', '變量不存在');
        echo Session::get('gender', function () {
            return '該session不存在';
        });
        // 獲取全部 session 變量
        // dd(Session::all());
        // 檢查 session 是否存在 true:1 false:null
        echo Session::has('name');
        // 移除 session
        // Session::forget('name');
    }

    /**
     * 快取設置
     *
     * @return void
     */
    public function cachetest()
    {
        // 設置一個緩存, 同名會覆蓋(分鐘)
        Cache::put('class', 'social', 10);
        Cache::put('class', 'geography', 10);
        // 設置一個緩存, 同名不添加
        Cache::add('class', 'none', 10);
        Cache::add('school', 'Fenchia', 10);
        // 獲取 cache 變量
        echo Cache::get('class');
        // 獲取 cache 變量, 不存在就返回默認值
        echo Cache::get('school', 'none');
        echo Cache::get('university', 'none');
        echo Cache::get('time', function () {
            return date('Y-m-d H:i:s', time());
        });
        // 檢查某個 cache 是否存在
        var_dump(Cache::has('time'));
        // 移除 cache
        Cache::forget('class');

        // 緩存計數器
        Cache::add('count', '0', 100);
        // Cache::increment('count');
        // 一次加 10
        Cache::increment('count', 10);
        // 一次減 2
        Cache::decrement('count', 2);

        // 獲取 Cache, 如果不存在就創建它並賦予它預設值
        $city = Cache::remember('city', 120, function () {
            return 'Taiwan';
        });
        // dd($city);
    }

    /**
     * 聯表查詢
     *
     * @return void
     */
    public function tableconnect()
    { //SELECT article.id, article.article_name,author.author_name FROM `article` LEFT JOIN `author` ON article.author_id = author.id;
        // 指定主表
        $data = DB::table('article')->select('article.id', 'article.article_name', 'author.author_name')->leftJoin('author', 'article.author_id', '=', 'author.id')->get();
        dd($data);
    }

    /**
     * 一對一關聯模型
     *
     * @return void
     */
    public function onetoone()
    {
        // 查詢數據
        $data = \App\OneToOne\Article::get();
        // 循環展示
        foreach ($data as $value) {
            echo $value->id . '&emsp;' . $value->article_name . '&emsp;' . $value->author->author_name . '&emsp;<br>';
        }
    }

    /**
     * 一對多關聯模型
     *
     * @return void
     */
    public function onetoall()
    {
        // 查詢數據
        $data = \App\OneToOne\Article::get();
        // 循環展示
        foreach ($data as $value) {
            echo '文章：' . $value->article_name . '<br>對應評論：<br>';
            // 循環評論
            foreach ($value->comment as $subValue) {
                echo $subValue->comment . '<br>';
            }
            echo '<hr>';
        }
    }

    /**
     * 多對多關聯模型
     *
     * @return void
     */
    public function alltoall()
    {
        // 查詢數據
        $data = \App\OneToOne\Article::get();
        // 循環展示
        foreach ($data as $value) {
            echo '文章：' . $value->article_name . '<br>對應關鍵字：<br>';
            // 循環關鍵字
            foreach ($value->keyword as $subValue) {
                echo $subValue->keyword . '<br>';
            }
            echo '<hr>';
        }
    }
}
