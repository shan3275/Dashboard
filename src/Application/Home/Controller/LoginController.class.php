<?php
namespace Home\Controller;

class LoginController extends BaseController {
    public function index(){
        $this->display();
    }
	//登陆判断
	function loginok(){
		$db = M('master');
		$result = $db->where(array('user'=>I('user')))->find();
		if(!$result){
			echo '帐号不存在！';
		}elseif($result['pwd'] != I('pwd','','md5')){
			echo '密码错误！';
		}else{
			$data = array(
			   'loginip'    => get_client_ip(),
			   'lastip'     => $result['loginip'],
			   'logintime'  => time(),
			   'lasttime'   => $result['logintime'],
			   'num'        => $result['num'] + 1
			);
			$db->where(array('id'=>$result['id']))->save($data);
			session('AdminUser',$result);
			echo 'ok';
		}
	}
	
	//退出登陆
	function loginout(){
		session(null);
		$this->redirect('index');
	}
}