<?php
	namespace app\index\model;
	use think\Model;
	class User extends Model
	{
	protected $table = 'think_user';
	protected $autoWriteTimestamp = true;
	// 定义自动完成的属性
	protected $insert = ['status' => 1];
	/*protected function getBirthdayAttr($birthday)
		{
			return date('Y-m-d', $birthday);
		}
	protected function getUserBirthdayAttr($value,$data)
		{
			return date('Y-m-d', $data['birthday']);
		}*/
	/*protected function getUserStatusAttr($value)
		{
			$status = [-1 => '删除', 0 => '禁用', 1 => '正常', 2 => '待审核'];
			return $status[$value];
		}*/
	protected function getBirthdayAttr($birthday)
		{
			return date('Y-m-d', $birthday);
		}
	protected function getEmailAttr($email)
	{
		return $email;
	}
	protected function getUserStatusAttr($value,$data)
	{
		$status = [-1 => '删除', 0 => '禁用', 1 => '正常', 2 => '待审核'];
		return $status[$data['status']];
	}
	// 定义关联方法
	public function profile()
		{
		// 用户HAS ONE档案关联
		return $this->hasOne('Profile');
		}
	public function books()
		{
		return $this->hasMany('Book');
		}
	public function roles()
		{
		// 用户 BELONGS_TO_MANY 角色
		return $this->belongsToMany('Role', 'think_access');
		}
	}

?>