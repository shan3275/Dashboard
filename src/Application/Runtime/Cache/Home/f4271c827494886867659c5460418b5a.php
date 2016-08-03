<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>LZH-CMS后台</title>
<meta name="robots" content="nofollow" />
<meta name=”viewport” content=”width=device-width, initial-scale=1, maximum-scale=1″>
<link href="/hybusi/Public/Home/css/admin-style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="/hybusi/Public/Static/js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="/hybusi/Public/Home/js/admin-common.js"></script>
</head>

<body>


<form name="form1" method="post" action="<?php echo U('addok');?>">

<div class="nav-table">

<span class="on" href="table-one">新增业务</span>

</div>

<div class="nav-bottom"></div>



<div class="input-box">

<ul id="table-one">

  <li>

  <li>

  <label for="user">新业务名称</label>

  <input type="text" name="name" id="user">例：广告

  </li>

  <li>

  <label for="pwd">新业务英文缩写</label>

  <input type="text" name="title" id="pwd">例：ad

  </li>

</li>



<div class="table-but"><input type="submit" name="button" id="button" value="确 认 添 加"></div>


</form>

</div>



</body>
</html>