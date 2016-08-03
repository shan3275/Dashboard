<?php
namespace Home\Controller;
use Think\Controller;

/**
 * 首页控制器
 * @package Home\Controller
 */
class IndexController extends CommonController {
    /**
     * 系统首页
     */
    public function index(){
        // 获取当前账户的登录信息
        $info = M('users')->field('loginnum')->where(array('id' => parent::$userid))->find();

        $this->assign('info', $info);
        $this->assign('SERVER_SOFTWARE', $_SERVER['SERVER_SOFTWARE']);
        $this->display();
    }

/*
        public function chartjs(){
        // 获取当前账户的登录信息
        $info = M('users')->field('loginnum')->where(array('id' => parent::$userid))->find();

        $this->assign('info', $info);
        $this->assign('SERVER_SOFTWARE', $_SERVER['SERVER_SOFTWARE']);
        $this->display();
    }
    */
        public function chartjs(){
            $result = M('gather_day');
            $list = $result->select();
            $array1 = array();
            $array2 = array();
            $array3 = array();
            foreach ($list as $key => $value) {
                $array1[] = $value['date'];
                $array2[] = $value['aim'];
                $array3[] = $value['reality']; 
            }
            $array_date    = json_encode($array1);
            $array_aim     = json_encode($array2);
            $array_reality = json_encode($array3);
            $this->assign('array_date',$array_date);
            $this->assign('array_aim',$array_aim);
            $this->assign('array_reality', $array_reality);
            // 获取当前账户的登录信息
            $info = M('users')->field('loginnum')->where(array('id' => parent::$userid))->find();

            $this->assign('info', $info);
            $this->assign('SERVER_SOFTWARE', $_SERVER['SERVER_SOFTWARE']);
           
            $this->display();
    }

            public function morris(){
            $result = M('gather_day');
            $list = $result->select();
            $array1 = array();
            //var_dump($list);
            foreach ($list as $key => $value) {
                $array1[$key][y] = $value['date'];
                $array1[$key][item1] = $value['aim'];
                $array1[$key][item2] = $value['reality']; 
            }
            $array_date    = json_encode($array1);
            $this->assign('array_date',$array_date);
            // 获取当前账户的登录信息
            $info = M('users')->field('loginnum')->where(array('id' => parent::$userid))->find();

            $this->assign('info', $info);
            $this->assign('SERVER_SOFTWARE', $_SERVER['SERVER_SOFTWARE']);
           
            $this->display();
    }

            public function simpletable(){
            // 获取当前账户的登录信息
            $info = M('users')->field('loginnum')->where(array('id' => parent::$userid))->find();

            $this->assign('info', $info);
            $this->assign('SERVER_SOFTWARE', $_SERVER['SERVER_SOFTWARE']);
           
            $this->display();
    }
    
            public function datatable(){
            $result = M('gather_day');
            $list = $result->select();
            $this->assign('list',$list);
            // 获取当前账户的登录信息
            $info = M('users')->field('loginnum')->where(array('id' => parent::$userid))->find();

            $this->assign('info', $info);
            $this->assign('SERVER_SOFTWARE', $_SERVER['SERVER_SOFTWARE']);
           
            $this->display();
    }
}
