<?php
namespace app\index\model;
use think\Model;
class Profile extends Model
	{
		/*protected $type = [
		'birthday' => 'timestamp:Y-m-d',
	];*/
	protected function getBirthdayAttr($birthday)
		{
			return date('Y-m-d', $birthday);
		}
	protected function getUserBirthdayAttr($value,$data)
		{
			return date('Y-m-d', $data['birthday']);
		}
}