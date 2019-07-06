<?php

namespace App\Http\Controllers\Home;

use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('username',session('user.username'))->first();
        return view('home.user.index');
    }

    public function update1(){
        $input = Input::except('_token');
        $user = User::where('name',session('user.name'))->first();
        if ($input['opassword']!=null){
            if ($input['opassword']!=$user['password1']){
                return back()->with('msg','原密码不正确');
            }
            if ($input['npassword']==null){
                return back()->with('msg','密码不能为空');
            }
            if ($input['npassword']!=$input['rpassword']){
                return back()->with('msg','确认密码与新密码不一致');
            }
            $input['password']=Crypt::encrypt($input['npassword']);
            $input['password1']=$input['npassword'];
        }
                unset($input['rpassword']);
                unset($input['npassword']);
                unset($input['opassword']);
        $res = User::where('name',session('user.name'))->update($input);
        if ($res){
            return back()->with('msg','修改成功');
        }else{
            return back()->with('msg','修改失败');
        }
    }


}
