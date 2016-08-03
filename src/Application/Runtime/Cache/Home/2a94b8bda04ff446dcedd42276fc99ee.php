<?php if (!defined('THINK_PATH')) exit();?><!doctype html>

<html>

<head>

<meta charset="utf-8">

<title>海妖科技业务汇总系统</title>

<meta name="robots" content="nofollow" />

<link href="/hybusi/Public/Home/css/admin-style.css" rel="stylesheet" type="text/css" />

<script language="javascript" type="text/javascript" src="/hybusi/Public/Static/js/jquery.js"></script>

<script language="javascript" type="text/javascript" src="/hybusi/Public/Home/js/admin-index.js"></script>

</head>



<body>



<div class="head">

<span class="z">

<a href='/hybusi/index.php/Home/Index/index.html'></a>

</span>

<span class="y">

  欢迎 <font color="#FFF"><?php echo ($AdminUser); ?></font> 使用海妖科技业务汇总系统&nbsp;<?php echo (THINK_VERSION); ?>

  <a class="tui" href="<?php echo U('Login/loginout');?>">退出登录</a>

</span>

</div>



<div class="left z" id="left">

  <div class="menu" id="index-Index">

   <h3 onclick="menu('index-Index')">管理中心</h3>

   <p id="menu-Index-index"><a href="<?php echo U('Index/home');?>">管理首页</a></p>

   <?php if(($lever) == "0"): ?><p id="menu-Index-Set-index"><a href="<?php echo U('Set/index');?>">系统设置</a></p><?php endif; ?>

  </div>



  <?php if(($lever) == "0"): ?><div class="menu" id="index-Master">

   <h3 onclick="menu('index-Master')">用户管理</h3>

   <p id="menu-Master-index"><a href="<?php echo U('Master/index');?>">管理员列表</a></p>

   <p id="menu-Master-add"><a href="<?php echo U('Master/add');?>">添加管理员</a></p>

  </div><?php endif; ?>



  <div class="menu" id="index-Plug">

   <h3 onclick="menu('index-Plug')">业务管理</h3>

   <?php if(($lever) == "0"): ?><p id="menu-Plug-index"><a href="<?php echo U('Cjrd/index');?>">新增业务</a></p>

    <!-- <p id="menu-Plug-index"><a href="<?php echo U('Cjrd/ad');?>">业务列表</a></p> --><?php endif; ?>

  <?php foreach($gather as $val){ ?>

   <p id="menu-Plug-index"><a href="<?php echo U('Advert/add',array('gid'=>$val['id']));?>"><?php echo ($val["name"]); ?>数据添加</a></p>

  <?php } ?>

  </div>

  </neq>

  

  <div class="menu" id="index-Datashow">

   <h3 onclick="menu('index-Datashow')">数据展示</h3>

   <?php if(($lever) == "0"): ?><p id="menu-Datashow-index"><a href="<?php echo U('Datashow/ad');?>?num=1">业务收益</a></p><?php endif; ?>

  <?php foreach($gather as $val){ ?>

     <p id="menu-Datashow-index"><a href="<?php echo U('Advert/ad',array('gid'=>$val['id']));?>?num=1"><?php echo ($val["name"]); ?>业务收益</a></p>

  <?php } ?>

  </div>

  

  <div class="menu" id="CopyRight">

   <h3>版权所有</h3>

   <ul>

   <li class="yz"><a href="http://www.haiyaotech.com/" target="_blank">海妖科技</a></li>

   <li class="tui"><a href="<?php echo U('Login/loginout');?>">退出登录</a></li>

   </ul>

  </div>

</div>



<iframe id="right" src="<?php echo U('Index/home');?>" frameborder="0" ></iframe>



</body>

</html>