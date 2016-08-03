<?php
namespace Home\Controller;

class LyrlController extends BaseController {

	function index(){
		$db = M('content');
		$where['link_type'] = isset($_GET['type']) ? $_GET['type'] : 1;
		$where['type'] = 2;
		$count = $db->where($where)->count();
		$page = new \Think\Page($count,15);
		$this->link = $db->where($where)->limit($page->firstRow.','.$page->listRows)->select();
		$this->page = $page->show();
		$this->assign('type',$where['link_type']);
		$this->display();
	}

	function show(){
		$db = M('content');
		$this->today = $db->where(array('type'=>2,'link_type'=>1,'date'=>date('m-d')))->order('create_time desc,update_time desc')->find();
		$this->locz = $db->where(array('type'=>2,'link_type'=>2,'pro_type'=>1))->order('create_time desc,update_time desc')->limit(3)->select();
		$this->locn = $db->where(array('type'=>2,'link_type'=>2,'pro_type'=>2))->order('create_time desc,update_time desc')->limit(3)->select();
		$this->locw = $db->where(array('type'=>2,'link_type'=>2,'pro_type'=>3))->order('create_time desc,update_time desc')->limit(3)->select();
		$this->display();
	}

	function edit(){
		$db = M('content');
		if(IS_POST){
			$_POST['type'] = 2;
			$_POST['status'] = 0;
			if(!empty($_GET['id'])){
				$type = $db->where(array('id'=>$_GET['id']))->getField('type');
				if($type == 1){
					$this->error('非法操作');
				}
				$_POST['update_time'] = time();
			}else{
				$_POST['create_time'] = time();
			}
			if(empty($_GET['id']) && empty($_FILES['photo']['tmp_name'])){
				$this->error('新增操作必须添加配图');
			}elseif(!empty($_FILES['photo']['tmp_name'])){
				$upload = new \Think\Upload();
				$upload->maxSize = 3145728;
				$upload->exts = array('jpg', 'gif', 'png', 'jpeg');
				$upload->savePath = './photo/lvrl/';
				$info = $upload->uploadOne($_FILES['photo']);
				if(!$info) {
					$this->error($upload->getError());
				}else{
					$_POST['photo'] = F('SiteDomain').'Uploads'.trim($info['savepath'].$info['savename'],'.');
				}
			}
			$db->create();
			$check = !empty($_GET['id']) ? $db->where(array('id'=>$_GET['id']))->save() : $db->add();
			if(!$check){
				$this->error('操作失败');
			}else{
				$this->success('操作成功',U('index'));
			}
		}else{
			$this->id = I('get.id');
			$this->val = $db->where(array('id'=>I('get.id')))->find();
			$this->display();
		}
	}

	function del(){
		if(IS_GET){
			$db = M('content');
			$type = $db->where(array('id'=>$_GET['id']))->getField('type');
			if($type == 1 || !$type){
				$this->error('非法操作');
			}
			$check = $db->where(array('id'=>$_GET['id']))->delete();
			if(!$check){
				$this->error('删除失败');
			}else{
				$this->success('删除成功',U('index'));
			}
		}
	}
}