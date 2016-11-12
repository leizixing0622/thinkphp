<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
class CommonController extends Controller{
	public function _initialize(){
			if(Session::get('name')!='kermit'){
			$this->redirect('Login/login');
			}
	}
}