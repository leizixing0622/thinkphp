<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Session;
use app\index\model\User as UserModel;
class Login extends Controller
{
    public function login()
    {
    	return view();
    }
    public function loginHandle(){
		$name = input('nickname');
		$password = md5(input('password'));
		$result = Db::name('user')->where('nickname', $name)->find();
		if($result != null){
			if($result['password']==$password){
				echo "登录成功";
				Session::set('name',$name);
			}else{
				echo"<script>alert('密码错误');history.go(-1);</script>";
			}
		}else{
			echo"<script>alert('用户名不存在');history.go(-1);</script>";
		}
		
		return;
	}
	public function add()
		{
			return view();
		}
	public function addHandle()
	{
		$user = new UserModel;
		$name = input('nickname');
		$result = Db::name('user')->where('nickname', $name)->find();
		if($result != null){
			echo"<script>alert('该用户名已被注册');history.go(-1);</script>";
		}else{
			$user->email = input('email');
			$user->nickname = input('nickname');
			$user->password = md5(input('password'));
			if ($user->save()) {
				echo"<script>alert('恭喜您$name,注册成功');location.href='../../'</script>";
				return;
			} else {
				return $user->getError();
			}
		}
		
	}
	public function logout(){
		session::set('name',null);
		session(null);
		echo "<script>alert('注销成功');</script>";
	}
}