<?php
namespace Home\Controller;
use Think\Controller;

class CountController extends Controller{
	public function jump(){
		$c_check = M('content')->where(array('id'=>$_GET['cid']))->find();
		if($c_check && ($c_check['type'] == 1 || $c_check['type'] == 2)){
			$come = $_SERVER['HTTP_REFERER'];
			preg_match_all('#https?://(.*?)($|/)#m',$come,$domain);
			$data['fromurl'] = $domain[1][0];
			$data['fromtype'] = 'click';
			$data['create_time'] = time();
			$data['type'] = 'ad';
			$data['conid'] = $_GET['cid'];
			M('ad')->add($data);
			$url = $c_check['content'];
			header("Location:$url");
		}
    }

    public function showcount(){
    	if(isset($_GET['callback']) && $_GET['fromtype'] == 'show'){
			$ip['iphost'] = get_client_ip();
			$check = M('useip')->where($ip)->find();
			if(!$check){
	        	$_GET['plugtype'] = 1;
	        }else{
	        	$_GET['plugtype'] = 2;
	        }
	        $callback = trim($_GET['callback']);
        	echo $callback.'('.json_encode($_GET).')';
		}
    }

    public function activitycount(){
    	$db = M('ad');
    	if(isset($_GET['callback']) && !empty($_GET['fromurl']) && $_GET['type'] == 'ac' && ($_GET['fromtype'] == 'show' || $_GET['fromtype'] == 'click')){
    		if($_GET['fromtype'] == 'show'){
    			$check = $db->where(array('fromurl'=>$_GET['fromurl'],'fromtype'=>'show','type'=>'ac'))->find();
    			if(!$check){
    				$data['fromurl'] = I('get.fromurl');
    				$data['fromtype'] = 'show';
    				$data['create_time'] = $data['new_time'] = time();
    				$data['type'] = 'ac';
    				$db->add($data);
    			}else{
    				$data['new_time'] = time();
    				$db->where(array('id'=>$check['id']))->save($data);
    			}
    		}elseif($_GET['fromtype'] == 'click'){
    			$data['fromurl'] = I('get.fromurl');
				$data['fromtype'] = 'click';
				$data['create_time'] = time();
				$data['type'] = 'ac';
    			$db->add($data);
    		}
    	}elseif(isset($_GET['callback']) && !empty($_GET['fromurl']) && $_GET['type'] == 'ad' && $_GET['fromtype'] == 'show'){
    		$check = $db->where(array('fromurl'=>$_GET['fromurl'],'fromtype'=>'show','type'=>'ad'))->find();
			if(!$check){
				$data['fromurl'] = I('get.fromurl');
				$data['fromtype'] = 'show';
				$data['create_time'] = $data['new_time'] = time();
				$data['type'] = 'ad';
				$db->add($data);
			}else{
				$data['new_time'] = time();
				$db->where(array('id'=>$check['id']))->save($data);
			}
    	}
    	$callback = trim($_GET['callback']);
        echo $callback.'('.json_encode($_GET).')';
    }
}