<?php

namespace App\Http\Controllers;
use App\Member; // 注意引用模型

class MemberController extends Controller
{

	public function info($id)
	{

		return Member::getMember();

		// return 'member-info-id-'.$id;
		// return route('memberinfo');

		// return view('member-info');
		/*return view('member/info',[
			'name'=>'哈哈哈', 
			'age' =>'18'
		]);*/

	}

}