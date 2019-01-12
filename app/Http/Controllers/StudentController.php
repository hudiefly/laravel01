<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;


use Illuminate\Support\Facades\DB;
use App\Student;

class StudentController extends Controller
{
    //使用DB facades实现CURD
    public function test1()
    {
        // return 'test1';

        // 查询
        // $students=DB::select('select * from students where id > ?',[2]);
        // dd($students);

        // 新增
        // $bool=DB::insert('insert into students(name,age) value(?,?)',['xiaolan',19]);
        // var_dump($bool);

        // 更新
        // $num=DB::update('update students set age=? where name=?',['20','hudie']);
        // var_dump($num);

        // 删除
        // $num=DB::delete('delete from students where id > ?',[5]);
        // var_dump($num);

    }


    // 查询构造器
    // 添加数据
    public function query1()
    {
        // $bool=DB::table('students')->insert(
        //     ['name'=>'xiaolan','age'=>18]
        // );
        // var_dump($bool);


        // 新增时得到自增id
        // $id=DB::table('students')->insertGetId(
        //     ['name'=>'xiaolan','age'=>18]
        // );
        // var_dump($id);

        // 插入多条数据
        $bool=DB::table('students')->insert([
            ['name'=>'xiaohong','age'=>19],
            ['name'=>'kity','age'=>20]
        ]);
        var_dump($bool);
    }

    // 更新数据
    public function query2()
    {

        // $num=DB::table('students')
        //     ->where('id',1)
        //     ->update(['age'=>11]);
        // var_dump($num);

        // 自增和自减
        // DB::table('students')->increment('age',3);
        // DB::table('students')->decrement('age',3);
        // DB::table('students')
        //     ->where('id',1)
        //     ->decrement('age',3);

        // DB::table('students')
        //     ->where('id',1)
        //     ->decrement('age',1,['name'=>'xiaohhha','sex'=>'20']);

    }

    // 使用查询构造器删除数据
    public function query3()
    {
        // $num=DB::table('students')
        //     ->where('id',1)
        //     ->delete();
        // var_dump($num);

        // $num=DB::table('students')
        //     ->where('id','>=',5)
        //     ->delete();
        // var_dump($num);

        // 清空表
        // DB::table('students')->truncate();
    }

    public function query4()
    {
        // $bool=DB::table('students')->insert([
        //     ['id'=>'1','name'=>'name1','age'=>18],
        //     ['id'=>'2','name'=>'name2','age'=>19],
        //     ['id'=>'3','name'=>'name3','age'=>20],
        //     ['id'=>'4','name'=>'name4','age'=>21],
        //     ['id'=>'5','name'=>'name5','age'=>22],
        // ]);
        // var_dump($bool);

        // get()
        // $students=DB::table('students')->get();

        // first取结果集里的第一条
        // $students=DB::table('students')
        //     ->orderBy('id','DESC')
        //     ->first();

        // where
        // $students=DB::table('students')
        //     ->where('id','>=',2)
        //     ->get();

        // 多条件查询
        // $students=DB::table('students')
        //     ->whereRaw('id >= ? and age > ?',[2,18])
        //     ->get();
        // dd($students);

        // pluck 返回结果集中指定的字段
        // $name=DB::table('students')
        //     ->pluck('name');

        // lists--5.4版本不支持
        // $name=DB::table('students')
        //     ->lists('name','id');

        // 指定查找
        // $name=DB::table('students')
        //     ->select('name','id','age')
        //     ->get();

        // chunk--5.4版本不支持
        // echo '<pre>';
        // DB::table('students')->chunk(3, function($student){
        //     var_dump($student);
        // }); 
    }

    // 聚合函数
    public function query5(){
        // $num=DB::table('students')->count();
        // $max=DB::table('students')->max('age');
        // $min=DB::table('students')->min('age');
        // $avg=DB::table('students')->avg('age');
        // $sum=DB::table('students')->sum('age');

        // var_dump($sum);
    }


    public function orm1()
    {
        // all 查询表的所有结构
        // $students=Student::all();

        // find
        // $student=Student::find(1);

        // findOrFail
        // $student=Student::findOrFail(1);

        // 查询构造器
        // $student=Student::get();
        // $student=Student::where('id','>',1)
        //     ->orderBy('id','DESC')
        //     ->first();

       // 聚合函数
        // $num=Student::count();

        // $max=Student::where('id','>=',2)->max('age');
        // var_dump($max);
    }

    public function orm2()
    {
        // 使用模型新增数据
        $student=new Student();
        $student->name='xiaoxiao';
        $student->age=23;
        $bool=$student->save();
        var_dump($bool);
    }



    public function upload(Request $require){
    	if($require->isMethod('POST')){
    		// var_dump($_FILES);
    		$file=$require->file('source');
    		// 文件是否上传成功
    		if($file->isValid()){
    			// 原文件名
    			$originalName=$file->getClientOriginalName();
    			// 扩展名
    			$ext=$file->getClientOriginalExtension();
    			// MimeType
    			$type=$file->getClientMimeType();
    			// 临时绝对路径
    			$realPath=$file->getRealPath();

    			$filename = date('Y-m-d-H-i-s').'-'.uniqid().$ext;
    			$bool=Storage::disk('uploads')->put($filename,file_get_contents($realPath));
    			var_dump($bool);
    		}


    		exit;
    	}
    	return view('student.upload');
    }
}
