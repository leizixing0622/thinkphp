<?php
namespace app\index\controller;
use app\index\model\Profile;
use app\index\model\Book;
use app\index\model\Role;
use think\Controller;
use think\Db;
use think\Session;
use app\index\model\User as UserModel;
class User extends CommonController
	{
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
					echo"<script>alert('恭喜您$name,注册成功');history.go(-1);</script>";
					return;
				} else {
					return $user->getError();
				}
			}
			
		}
		public function home(){
			return view();
		}
}