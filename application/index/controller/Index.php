<?php
namespace app\index\controller;
use think\Controller;
class Index extends CommonController
{
    public function index()

    {
    	$this->view->replace(['[title]' => '首页']);
    	return view();
    }
    public function hello($name = 'hello'){
    	return '成功';
    }
}
