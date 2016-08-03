<?php
namespace Home\Controller;

class SetController extends BaseController{
	function index(){
		if(IS_POST){
			F('SiteDomain',$_POST['SiteDomain']);
			$this->success('设置成功');
		}else{
			$this->display();
		}
	}
}