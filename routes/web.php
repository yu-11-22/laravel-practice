<?php
/*
 * @Author: yu-11-22 willy24692485@gmail.com
 * @Date: 2022-09-19 17:41:07
 * @LastEditors: yu-11-22 willy24692485@gmail.com
 * @LastEditTime: 2022-10-05 10:40:46
 * @FilePath: \second-laravel\routes\web.php
 * @Description: 这是默认设置,请设置`customMade`, 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 */

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::any('/form', 'TestController@autoVerify');
Route::any('/uploadfile', 'TestController@uploadfile');
Route::any('/pagination', 'TestController@pagination');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/ajaxblade','TestController@ajaxblade');
Route::get('/ajax','TestController@ajaxtest');