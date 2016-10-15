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
        define("LOOP_MAX", 10);
        //推送打开
        define("PUSH_ON", 1);
        //推送关闭
        define("PUSH_OFF", 0);
        //定向推送
        define("PUSH_DX", 1);
        //普推
        define("PUSH_PT", 0);

        //url 存放投放域名,默认为空
        $url = null;

        $refer = $_SERVER['HTTP_REFERER'];
        \Think\Log::write(sprintf("%s(%d) HTTP_REFERER:%s",__FUNCTION__ , __LINE__, $refer), 'DEBUG');
        if ($refer != null)
        {
            for ($i=0; $i < LOOP_MAX; $i++)
            {
                \Think\Log::write(sprintf("%s(%d) 优先级(%d)",__FUNCTION__ , __LINE__, $i), 'DEBUG');
                $User = M("ad"); // 实例化ad对象
                //根据优先级进行查询,优先级0-9,数字越小优先级越高
                $condition['prio'] = $i;
                // 把查询条件传入查询方法
                $info = $User->where($condition)->find();

                //查询失败退出继续查询
                if ($info == null)
                {
                    \Think\Log::write(sprintf("%s(%d) 未查询到该优先级表项,故退出继续查询",__FUNCTION__ , __LINE__), 'DEBUG');
                    continue;
                }

                //投放状态关闭,退出继续查询
                if ($info['push_status'] == PUSH_OFF)
                {
                    \Think\Log::write(sprintf("%s(%d) 投放状态为关闭,故退出继续查询",__FUNCTION__ , __LINE__), 'DEBUG');
                    continue;
                }

                //判断是否在投放时间中,如果不在退出继续查询
                $t=time();
                if ($t < $info['begin_time'])
                {
                    \Think\Log::write(sprintf("%s(%d) 当前时间小于开始时间, 开始时间(%s)",__FUNCTION__ , __LINE__, date("Y-m-d H:i:s",$info['begin_time'])), 'DEBUG');
                    continue;
                }
                if ($t > $info['end_time'])
                {
                    \Think\Log::write(sprintf("%s(%d) 当前时间大于结束时间, 结束时间(%s)",__FUNCTION__ , __LINE__, date("Y-m-d H:i:s",$info['end_time'])), 'DEBUG');
                    continue;
                }

                //当前时间在投放时间中
                //判断是否到量
                //如果到量退出继续查询
                if ($info['push_num'] >= $info['set_num'])
                {
                    \Think\Log::write(sprintf("%s(%d) 完成到量,设置数量(%d),实际推送量(%d)",__FUNCTION__ , __LINE__, $info['set_num'], $info['push_num']), 'DEBUG');
                    continue;
                }

                //定向推送
                if ($info['push_method'] == PUSH_DX)
                {
                    $con['ad_id'] = $info['id'];
                    //$con['domain'] = $refer;
                    \Think\Log::write(sprintf("%s(%d) 定向查询,id->(%d),domain->(%s)",__FUNCTION__ , __LINE__,
                        $con['ad_id'], $con['domain']), 'DEBUG');
                    // 把查询条件传入查询方法
                    //命中标志
                    $shot = 0;
                    $domain = M("domain")->where($con)->select();
                    if ($domain == null )
                    {
                        \Think\Log::write(sprintf("%s(%d) 定向未命中域名,故退出继续查询",__FUNCTION__ , __LINE__), 'DEBUG');
                        continue;
                    }
                    else
                    {
                        foreach ($domain as $key => $value) {
                            if(stristr($refer,$value['domain']))
                            {
                                $con['domain'] = $value['domain']; //后面增加统计使用
                                $shot = 1;
                                break;
                            }
                        }
                        \Think\Log::write(sprintf("%s(%d) 命中标志(%d)",__FUNCTION__ , __LINE__, $shot), 'DEBUG');

                    }

                    if ($shot)
                    {
                        \Think\Log::write(sprintf("%s(%d) 命中域名(%s) refer(%s)",__FUNCTION__ , __LINE__, $con['domain'], $refer),'DEBUG');
                    }
                    else
                    {
                        \Think\Log::write(sprintf("%s(%d) 未命中域名(%s)",__FUNCTION__ , __LINE__,  $refer),'DEBUG');
                        continue;
                    }

                }
                //普推+定向推送返回
                $url=$info['url'];
                \Think\Log::write(sprintf("%s(%d) 推送url(%s)",__FUNCTION__ , __LINE__,$url), 'DEBUG');

                //增加统计
                $User->where($condition)->setInc('push_num');
                if ($info['push_method'] == PUSH_DX && $shot)
                {
                    M("domain")->where($con)->setInc('push_num');
                }

                //跳出
                \Think\Log::write(sprintf("%s(%d) 完成退出",__FUNCTION__ , __LINE__), 'DEBUG');

                break;
            }
        }
        else
        {
            //refer 为空,作为调试使用
            \Think\Log::write(sprintf("%s(%d) refer为空,不查询需求规则,走默认规则!",__FUNCTION__ , __LINE__), 'DEBUG');
            $url = 'http://219.234.83.60/sc/ad.html';
        }

        //需求没有命中,设置默认投放链接
        if ($url == null)
        {
            $url = 'http://219.234.83.60/sc/ad.html';
            \Think\Log::write(sprintf("%s(%d) 全部需求都没有命中,走默认投放链接!",__FUNCTION__ , __LINE__), 'DEBUG');
        }

        \Think\Log::write(sprintf("%s(%d) url:%s",__FUNCTION__ , __LINE__, $url), 'DEBUG');
        //$this->assign('url', $url);
        //$this->display();
        header("Location: $url");
    }
}
