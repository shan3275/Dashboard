<?php
namespace Home\Controller;


class IndexController extends BaseController{
    function index(){
    	$user = session('AdminUser');
    	$gath = M('gath');
    	if($user['lever'] == 1){
    		$this->assign('permis',$user['permis']);
    		$gather = $gath->where(array('title' => $user['permis']))->select();
    	}else{
    		$gather = $gath->select();
    	}
    	
    	$this->assign('gather',$gather);
        $this->display();
    }
	
	function delFile($dirName){
		if($handle = opendir($dirName)){
			 while($item = readdir($handle)){
				 if($item != "." && $item != ".." && $item != 'index.html'){
					 if(is_dir("$dirName/$item")){
						 $this->delFile("$dirName/$item");
					  }else{
						  unlink("$dirName/$item");
					  }
				}
		      }
		}
		closedir( $handle );  
	}
	
	function clear(){
		$this->delFile(CACHE_PATH);
		$this->delFile(LOG_PATH);
		$this->delFile(DATA_PATH.'_fields/');
		unlink(RUNTIME_PATH.'common~runtime.php');
		$this->success('清理成功','home');
	}

	function cleardata(){
		$check = M('useip')->where('1')->delete();
		if(!$check){
			$this->error('清除失败');
		}else{
			$this->success('清除成功');
		}
	}
	
	function home(){
		
		
		$user = session('AdminUser');
		$this->loginTime = M('master')->where(array('user'=>$user['user']))->getField('lasttime');
		$this->display();
    }


}