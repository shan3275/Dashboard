<?php
namespace Admin\Model;
use Think\Model;
class MasterModel extends Model{
	protected $_validate = array(
		array('user','','帐号名称已经存在！',0,'unique',1),
	);
	protected $_auto = array(
		array('pwd','md5',3,'function'),
	);
}