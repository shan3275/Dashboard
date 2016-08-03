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


<form id="form1" name="form1" method="post" action="">

<div class="nav-table">
<span class="on" href="table-one">站点设置</span>
</div>
<div class="nav-bottom"></div>


<div class="input-box">
<!--站点设置 -->
<ul id="table-one">
  <li>
   <label for="SiteDomain">站点域名</label>
   <input type="text" name="SiteDomain" id="SiteDomain" value="<?php echo F('SiteDomain');?>" />(请填写完整的URL如 http://www.zyab.net/)
  </li>
</ul>




  <div class="table-but"><input type="submit" name="button" id="button" value="修改"></div>
</div>

</form>

</body>
</html>