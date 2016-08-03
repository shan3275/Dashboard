<?php
namespace Home\Controller;

class CjrdController extends BaseController {

	function index(){
		$this->display();
	}

	function addok(){
		if(IS_POST){
			$db = M('gath');
			$sele_name = $db->where(array('name' => $_POST['name']))->find();
			$sele_title = $db->where(array('title' => $_POST['title']))->find();
			if(isset($sele_name)){
				$this->error('业务名称已存在，请重新输入');exit;
			}elseif(isset($sele_title)){
				$this->error('业务的英文缩写已存在，请重新输入');exit;
			}
			$db->create();
			$check = $db->add();
			if(!$check){
				$this->error('添加失败');
			}else{
				$this->success('添加成功','index');
			}
			
		}
	}

	function ad(){
		$db = M('gath');
		$this->user = $db->order('id asc')->select();
		$this->display();
	}

}