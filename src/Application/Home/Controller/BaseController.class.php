<?php
namespace Home\Controller;
use Think\Controller;

class BaseController extends Controller {

    function _initialize(){
        //登陆判断
		if(isset($_SESSION['AdminUser']) && $_SESSION['AdminUser'] != ''){
			$this->assign('AdminUser',$_SESSION['AdminUser']['user']);
			$this->assign('lever',$_SESSION['AdminUser']['lever']);
			$user = session('AdminUser');
			// if($user['lever'] == 1){
			// 	if(CONTROLLER_NAME != $user['permis'] && CONTROLLER_NAME != 'Index' && CONTROLLER_NAME != 'Login'){
			// 		$this->error('您无权访问该模块');
			// 	}
			// }
		}elseif(CONTROLLER_NAME != 'Login'){
			$this->redirect('Login/index');
		}
    }
}