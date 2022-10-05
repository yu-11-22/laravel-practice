<?php
/*
 * @Author: yu-11-22 willy24692485@gmail.com
 * @Date: 2022-09-20 13:39:43
 * @LastEditors: yu-11-22 willy24692485@gmail.com
 * @LastEditTime: 2022-10-05 12:24:13
 * @FilePath: \second-laravel\app\Http\Controllers\TestController.php
 * @Description: 这是默认设置,请设置`customMade`, 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 */

namespace App\Http\Controllers;

use App\Member;
use Session;
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
}
