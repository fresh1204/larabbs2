<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Handlers\ImageUploadHandler;

class UsersController extends Controller
{
    //显示用户个人信息页面
    public function show(User $user)
    {
    	return view('users.show',compact('user'));
    }

    //编辑个人信息页面
    public function edit(User $user)
    {
    	return view('users.edit',compact('user'));
    }

    //处理表单提交的更新数据
    public function update(UserRequest $request,User $user,ImageUploadHandler $uploader)
    {
    	//dd($request->avatar);
    	$data = $request->all();

    	//如果有图片上传
    	if($request->avatar){
    		$result = $uploader->save($request->avatar,'avatars',$user->id,416);
    		//符合要求的图片
    		if($result){
    			//获取保存到数据库中的图片路径
    			$data['avatar'] = $result['path'];
    		}
    	}

    	$user->update($data);

    	return redirect()->route('users.show',$user->id)->with('success','个人资料更新成功！');
    }
}
