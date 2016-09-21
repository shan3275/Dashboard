<?php
namespace Home\Controller;
use Think\Controller;

/**
 * 通用控制器
 * 主要用于验证是否登陆 以及 用户权限
 * @package Home\Controller
 */
class CommonController extends Controller {
    /* 定义用户id*/
    public static $userid = '';
}