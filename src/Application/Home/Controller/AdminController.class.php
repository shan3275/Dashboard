<?php
namespace Home\Controller;

use Think\Controller;
use Think\Session\Driver\Memcache;

/**
 * 首页控制器
 * @package Home\Controller
 */
class AdminController extends CommonController
{
    /**
     * 自动执行
     */
    public function _initialize()
    {
        // 判断用户是否登录
        if (session('uid')) {
            $this->userid = session('uid');
        } else {
            $this->error('对不起,您还没有登录,正跳转至登录面...', U('Login/login'));
        }
    }

    /**
     * 系统首页
     */
    public function admin()
    {
        // 获取当前账户的登录信息
        $info = M('users')->field('loginnum')->where(array('id' => parent::$userid))->find();
        $this->assign('info', $info);
        $this->assign('SERVER_SOFTWARE', $_SERVER['SERVER_SOFTWARE']);
        $this->display();
    }


    //需求统计,查看概略
    public function query($Id='0', $PushStatus='2')
    {
        //更新推送状态
        if ($Id != '0' && $PushStatus != '2')
        {
            $condition['id'] = $Id;
            //推送状态取反
            $con['push_status'] = !$PushStatus;
            M('ad')->where($condition)->save($con);
        }
        //推送打开
        define("PUSH_ON", 1);
        //推送关闭
        define("PUSH_OFF", 0);
        $result = M('ad');
        $list = $result->select();
        foreach ($list as $key => $value) {
            $query[$key]['id'] = $value['id'];
            $query[$key]['push_status_str'] = ($value['push_status'] == PUSH_ON) ? "投放中" : "已挂起";
            $query[$key]['push_status'] = $value['push_status'];
            $query[$key]['name'] = $value['name'];
            $query[$key]['prio'] = $value['prio'];
            $query[$key]['push_time'] = sprintf("%s 至 %s", date("Y-m-d H:i:s", $value['begin_time']),
                date("Y-m-d H:i:s", $value['end_time']));
        }
        $this->assign('query', $query);

        // 获取当前账户的登录信息
        $info = M('users')->field('loginnum')->where(array('id' => parent::$userid))->find();
        $this->assign('info', $info);
        $this->assign('SERVER_SOFTWARE', $_SERVER['SERVER_SOFTWARE']);
        $this->display();
    }

    //需求统计,查看详单
    public function detail($id)
    {
        //推送打开
        define("PUSH_ON", 1);
        //推送关闭
        define("PUSH_OFF", 0);
        //定向推送
        define("PUSH_DX", 1);
        //普推
        define("PUSH_PT", 0);
        $result = M('ad');
        $condition['id'] = $id;
        $value = $result->where($condition)->find();
        if ($value) {
            $query['id'] = $value['id'];
            $query['push_status_str'] = ($value['push_status'] == PUSH_ON) ? "投放中" : "已挂起";
            //$query['push_status'] = $value['push_status'];
            $query['push_method_str'] = ($value['push_method'] == PUSH_DX) ? "定向" : "普推";
            $query['push_method'] = $value['push_method'];
            $query['name'] = $value['name'];
            $query['prio'] = $value['prio'];
            $query['begin_time'] = date("Y-m-d H:i:s", $value['begin_time']);
            $query['end_time'] = date("Y-m-d H:i:s", $value['end_time']);
            $query['set_num'] = $value['set_num'];
            $query['url'] = $value['url'];
        }

        //查询url
        $con_url['ad_id'] = $id;
        $url = M('domain')->where($con_url)->select();
        if ($url) {
            foreach ($url as $key => $value) {
                $query['domain'] .= $value['domain'];
                $query['domain'] .= "\n";

            }
        }
        $this->assign('query', $query);

        // 获取当前账户的登录信息
        $info = M('users')->field('loginnum')->where(array('id' => parent::$userid))->find();
        $this->assign('info', $info);
        $this->assign('SERVER_SOFTWARE', $_SERVER['SERVER_SOFTWARE']);
        $this->display();
    }

    //需求,删除
    public function querydel($id)
    {
        $result = M('ad');
        $condition['id'] = $id;
        $result->where($condition)->delete();
        $con_url['ad_id'] = $id;
        M('domain')->where($con_url)->delete();
        $this->success('', U('Admin/query'), 0);
    }

    //需求添加
    public function queryadd($id='2')
    {

        if (IS_POST) {
            \Think\Log::write(sprintf("%s(%d) domain:%s",__FUNCTION__ , __LINE__, $_POST['domain']), 'DEBUG');
            $query['id'] = '';
            $query['name'] = $_POST['name'];
            $query['prio'] = $_POST['prio'];
            $condition['prio'] = $query['prio'];
            if (M('ad')->where($condition)->find())
            {
                $this->error('优先级重复,请更改!');
            }
            $query['push_method'] = $_POST['push_method'];
            $query['push_status'] = '0';
            $query['set_num'] = $_POST['set_num'] * 1000;
            $query['url'] = $_POST['url'];
            $begin_time = null;
            $end_time = null;
            sscanf($_POST['time'],"%s - %s",$begin_time, $end_time);
            $query['begin_time'] = strtotime($begin_time)+1;
            $query['end_time'] = strtotime($end_time) + 24*60*60-1;
            $query['push_num'] = '0';
            M('ad')->add($query);

            $domain = $_POST['domain'];
            \Think\Log::write(sprintf("%s(%d) domain:%s",__FUNCTION__ , __LINE__, $domain), 'DEBUG');
            if ($domain != null)
            {
                //获取广告id
                $new_query =  M('ad')->where($condition)->find();
                if ($new_query != null)
                {
                    $ad_id = $new_query['id'];
                    \Think\Log::write(sprintf("%s(%d) 新需求id:%d",__FUNCTION__ , __LINE__, $ad_id), 'DEBUG');
                    $textArr = Array();
                    $textArr = explode(PHP_EOL,$domain);//"<br />"作为分隔切成数组
                    for($index=0;$index<count($textArr);$index++)
                    {
                        $query_doman['ad_id']  = $ad_id;
                        $query_doman['domain'] = $textArr[$index];
                        M('domain')->add($query_doman);
                    }

                }
            }
        }

        // 获取当前账户的登录信息
        $info = M('users')->field('loginnum')->where(array('id' => parent::$userid))->find();
        $this->assign('info', $info);
        $this->assign('SERVER_SOFTWARE', $_SERVER['SERVER_SOFTWARE']);
        $this->display();
    }


    //需求统计
    public function querystat()
    {
        $result = M('ad');
        $list = $result->select();
        $this->assign('list', $list);

        // 获取当前账户的登录信息
        $info = M('users')->field('loginnum')->where(array('id' => parent::$userid))->find();
        $this->assign('info', $info);
        $this->assign('SERVER_SOFTWARE', $_SERVER['SERVER_SOFTWARE']);
        $this->display();
    }

    //需求统计
    public function domainstat()
    {
        $result = M('domain');
        $list = $result->select();
        $this->assign('list', $list);
        // 获取当前账户的登录信息
        $info = M('users')->field('loginnum')->where(array('id' => parent::$userid))->find();
        $this->assign('info', $info);
        $this->assign('SERVER_SOFTWARE', $_SERVER['SERVER_SOFTWARE']);
        $this->display();
    }
}
