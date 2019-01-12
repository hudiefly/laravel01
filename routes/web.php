<?php

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

// 路由关联控制器
// Route::get('member/info','MemberController@info');

// Route::get('member/info',['uses'=>'MemberController@info']);

// 路由起别名
// Route::any('member/info',[
// 	'uses'=>'MemberController@info',
// 	'as'=>'memberinfo'
// ]);

// 参数绑定

// Route::get('member/{id}',['uses'=>'MemberController@info'])->where('id','[0-9]+');


Route::any('test1',['uses'=>'StudentController@test1']);

Route::any('query1',['uses'=>'StudentController@query1']);

Route::any('query2',['uses'=>'StudentController@query2']);
Route::any('query2',['uses'=>'StudentController@query2']);
Route::any('query3',['uses'=>'StudentController@query3']);
Route::any('query4',['uses'=>'StudentController@query4']);
Route::any('query5',['uses'=>'StudentController@query5']);
Route::any('orm1',['uses'=>'StudentController@orm1']);
Route::any('orm2',['uses'=>'StudentController@orm2']);





// 基础路由
// get请求路由
Route::get('basic1',function(){
	return 'Hello World';
});

// post请求路由
Route::post('basic2',function(){
	return 'Basic2';
});

// 多请求路由
// 1 match 指定方式
Route::match(['get','post'],'multy1',function(){
	return 'multy1';
});
// 2 any 支持多种请求
Route::any('multy2',function(){
	return 'multy2';
});

// 路由参数
// 可以获取请求路由的url区段
// Route::get('user/{id}',function($id){
// 	return 'user-id'.$id;
// });

// Route::get('user/{name?}',function($name = 'sean'){
// 	return 'user-name-'.$name;
// });

// Route::get('user/{id}/{name?}',function($id, $name = 'sean'){
// 	return 'user-id-'.$id.'-user-name-'.$name;
// })->where(['id'=>'[0-9]+','name'=>'[A-za-z]+']);

// 路由别名
// Route::get('user/center',['as'=>'center',function(){
// 	return route('center');
// }]);


// 路由群组
Route::group(['prefix'=>'member'],function(){
	Route::get('user/center',['as'=>'center',function(){
		return route('center');
	}]);

	Route::any('multy2',function(){
		return 'member-multy2';
	});
});

// 路由中输出视图
Route::get('view', function () {
    return view('welcome');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::any('upload', 'StudentController@upload')->name('upload');
