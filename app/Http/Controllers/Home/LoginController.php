<?php
namespace App\Http\Controllers\Home;
use App\Model\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class LoginController extends CommonController
{
    /**
     * 用户登录
     */
    public function login(){
        if ($input = Input::all()){
            $user=User::where('username',$input['username'])->where('status',1)->first();
            if (!$user){
                return back()->with('msg','此用户不存在!');
            }
            if ($input['password'] != decrypt($user->password)){
                return back()->with('msg','密码错误!');
            }
            session(['user'=>$user]);
            return redirect('/');
        }else{
            return view('home.login');
        }

    }
    public function loginout(){
        session(['user'=>null]);
        return redirect('home/login');
    }

    /**
     * 用户注册
     */
    public function register(){
        return view('home.register');
    }
    public function store(){
        $input = Input::except('_token');

       $rel =  User::where('nickname',$input['nickname'])->first();
        if ($rel){
            return back()->with('ms','昵称已被注册');
        }
        if ($input['password']==null){
            return back()->with('ms','密码不能为空');
        }
        if ($input['password']!=$input['password1']){
                return back()->with('ms','密码不一致');
        }
        $rules = [
            'username'=>'required',
            'password'=>'required',
        ];

        $message=[
            'username.required'=>'昵称不能为空！',
            'password.required'=>'密码不能为空！',
        ];
        $validate = Validator::make($input,$rules,$message);
        if ($validate->passes()) {
            $input['password'] = encrypt($input['password']);
            $rel = User::create($input);
            if ($rel) {
                return back()->with('msg', '注册成功');
            }
        }else{
            return back()->withErrors($validate);
        }



    }

}