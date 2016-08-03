<?php
namespace Home\Controller;

class PlugController extends BaseController {
	function window(){
		if(IS_POST){
			$iframeurl['activity'] = I('post.activity');
			$iframeurl['ac_jump'] = I('post.ac_jump');
			$iframeurl['ad'] = I('post.ad');
			$iframeurl['ad_jump'] = I('post.ad_jump');
			F('iframeurl',$iframeurl);
			$check = F('iframeurl');
			if(!$check){
				$this->error('操作失败');
			}else{
				createplug(2);
				$this->success('操作成功');
			}
		}else{
			$this->val = F('iframeurl');
			$this->display();
		}
	}
	// function hao12(){
	// 	$check = F('iframeurl');
	// 	createplug(1);
	// 	// $this->success('成功');
	// }
	function audit(){
		$db = M('content');
		if(!empty($_GET['id'])){
			$check = $db->where(array('id'=>$_GET['id']))->setField('status',1);
			if(!$check){
				$this->error('审核失败');
			}else{
				$this->success('审核通过',U('audit'));
			}
		}else{
			$count = $db->where(array('status'=>0))->count();
			$page = new \Think\Page($count,15);
			$this->ready = $db->where(array('status'=>0))->limit($page->firstRow.','.$page->listRows)->select();
			$this->page = $page->show();
			$this->display();
		}
	}

	function del(){
		if(IS_GET){
			$check = M('content')->where(array('id'=>$_GET['id']))->delete();
			if(!$check){
				$this->error('删除失败');
			}else{
				$this->success('删除成功',U('index'));
			}
		}
	}

	// function cjrd(){
	// 	$db = M('content');
	// 	$where['link_type'] = isset($_GET['type']) ? $_GET['type'] : 1;
	// 	$count = $db->where($where)->count();
	// 	$page = new \Think\Page($count,15);
	// 	$this->link = $db->where($where)->limit($page->firstRow.','.$page->listRows)->select();
	// 	$this->page = $page->show();
	// 	$this->assign('type',$where['link_type']);
	// 	$this->display();
	// }

	// function cjrdedit(){
	// 	$db = M('content');
	// 	if(IS_POST){
	// 		$_POST['type'] = 1;
	// 		$_POST['status'] = 0;
	// 		if(!empty($_GET['id'])){
	// 			$type = $db->where(array('id'=>$_GET['id']))->getField('type');
	// 			if($type == 2){
	// 				$this->error('非法操作');
	// 			}
	// 			$_POST['update_time'] = time();
	// 		}else{
	// 			$_POST['create_time'] = time();
	// 		}
	// 		$db->create();
	// 		$check = !empty($_GET['id']) ? $db->where(array('id'=>$_GET['id']))->save() : $db->add();
	// 		if(!$check){
	// 			$this->error('操作失败');
	// 		}else{
	// 			$this->success('操作成功',U('cjrd'));
	// 		}
	// 	}else{
	// 		$this->id = I('get.id');
	// 		$this->val = $db->where(array('id'=>I('get.id')))->find();
	// 		$this->display();
	// 	}
	// }

	// function lyrl(){
	// 	$this->display();
	// }

	// function delete(){
	// 	if(IS_GET){
	// 		if($_GET['type'] == 1){
	// 			M('class')->where(array('id'=>$_GET['id']))->delete();
	// 			M('content')->where(array('cid'=>$_GET['id']))->delete();
	// 		}elseif($_GET['type'] == 2){
	// 			M('content')->where(array('id'=>$_GET['id']))->delete();
	// 		}
	// 		$this->success('删除成功');
	// 	}
	// }

	// function classlist(){
	// 	$this->class = M('class')->select();
	// 	$this->display();
	// }

	// function content(){
	// 	if(IS_GET){
	// 		$this->cid = $_GET['id'];
	// 		$classdata = M('class')->where(array('id'=>$_GET['id']))->find();
	// 		$condb = M('content');
	// 		switch($classdata['type']){
	// 			case 2:
	// 				$this->val = $condb->where(array('cid'=>$_GET['id'],'type'=>2))->select();
	// 				$view = 'list';
	// 				break;
	// 			default:
	// 				$this->val = $condb->where(array('cid'=>$_GET['id'],'type'=>$classdata['type']))->find();
	// 				if($classdata['type'] == 3){
	// 					$view = 'text';
	// 				}elseif($classdata['type'] == 1){
	// 					$view = 'url';
	// 				}else{
	// 					$this->error('未知错误');
	// 				}
	// 				break;
	// 		}
	// 		$this->assign('classdata',$classdata);
	// 		$this->display($view);
	// 	}
	// }

	// function editlink(){
	// 	$this->edit = $_GET['edit'];
	// 	$this->classdata = M('class')->where(array('id'=>$_GET['cid']))->find();
	// 	$this->val = M('content')->where(array('id'=>$_GET['id']))->find();
	// 	$this->id = isset($_GET['id']) ? $_GET['id'] : $this->classdata['id'];
	// 	$this->display();
	// }

	// function editcontent(){
	// 	if(IS_POST){
	// 		$classdata = M('class')->where(array('id'=>$_GET['cid']))->find();
	// 		$condb = M('content');
	// 		switch($classdata['type']){
	// 			case 2:
	// 				if($_GET['edit'] == 1){
	// 					$_POST['cid'] = $_GET['id'];
	// 					$_POST['type'] = $classdata['type'];
	// 					$_POST['create_time'] = time();
	// 					$condb->create();
	// 					$check = $condb->add();
	// 				}elseif($_GET['edit'] == 2){
	// 					$_POST['update_time'] = time();
	// 					$condb->create();
	// 					$check = $condb->where(array('id'=>$_GET['id']))->save();
	// 				}else{
	// 					$this->error('未知错误');
	// 				}
	// 				break;
	// 			default:
	// 				$incheck = $condb->where(array('cid'=>$classdata['id'],'type'=>array('in','1,3')))->find();
	// 				if(!$incheck){
	// 					$_POST['cid'] = $classdata['id'];
	// 					$_POST['type'] = $classdata['type'];
	// 					$_POST['create_time'] = time();
	// 					$condb->create();
	// 					$check = $condb->add();
	// 				}else{
	// 					$_POST['type'] = $classdata['type'];
	// 					$_POST['update_time'] = time();
	// 					$condb->create();
	// 					$check = $condb->where(array('cid'=>$classdata['id'],'type'=>array('in','1,3')))->save();
	// 				}
	// 				break;
	// 		}
	// 		if(!$check){
	// 			$this->error('操作失败');
	// 		}else{
	// 			if($classdata['type'] == 2){
	// 				$jump = U('content',array('id'=>$classdata['id']));
	// 			}else{
	// 				$jump = '';
	// 			}
	// 			$this->success('操作成功',$jump);
	// 		}
	// 	}
	// }
}