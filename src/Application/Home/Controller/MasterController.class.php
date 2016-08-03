<?php
namespace Home\Controller;


class MasterController extends BaseController{
    function index(){
		$this->user = M('master')->select();
        $this->display();
    }
	
	function edit(){
		$this->content = M('master')->where(array('id'=>I('id')))->find();
		$this->display();
	}

	function addok(){
		if(IS_POST){
			$db = D('master');
			$_POST['pwd'] = md5($_POST['pwd']);
			if($_POST['permis'] != '1'){
				$_POST['lever'] = 1;
			}
			if(!$db->create()){
				$this->error($db->getError());
			}else{

				$check = $db->add();
				if(!$check){
					$this->error('添加失败');
				}else{
					$this->success('添加成功','index');
				}
			}
		}
	}

	function editok(){
		if(IS_POST){
			if($_POST['pwd'] == ''){
				$this->error('请输入新密码');
			}
			$db = D('master');
			$_POST['pwd'] = md5($_POST['pwd']);
			if(!$db->create()){
				$this->error($db->getError());
			}else{
				$check = $db->where(array('id'=>I('post.id')))->save();
				if($check){
					$this->success('修改成功','index');
				}else{
					$this->error('修改失败');
				}
			}
		}
	}

	function delete(){
		$id = I('id');
		if($id){
			$db = M('master');
			$re = $db->where(array('id'=>$id))->delete();
			if($re){
				$this->success('删除成功',U('index'));
			}else{
				$this->error('删除失败');
			}
		}
	}
	
	function add(){
		$gath = M('gath');
		$gather = $gath->select();
		$data['gather'] = $gather;
		// dump($gather);
		$this->assign($data);
		$this->display();
	}
}