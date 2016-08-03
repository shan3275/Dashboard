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




<style type="text/css">

  .edit-ul{display: none;}

</style>


<div class="nav-table">

<span class="on">推广业务数据操作</span>

</div>



<div class="nav-bottom"></div>



<div class="input-box">


<ul class="licai edit-ul" style="display:block">

  <form class="table-form" name="form1" enctype="multipart/form-data" method="post" action="<?php echo U('edit');?>">



  <li>

   <label for="title">日期</label>

   <input type="date" name="date" id="title" value="<?php echo ($show["date"]); ?>" />


  </li>

  <li>

   <label for="url">目标收益</label>

   ￥<input type="text" name="aim" id="url" value="<?php echo ($show["ex_aim"]); ?>" />

  </li>

  <li>

   <label for="url">实际收益</label>

   ￥<input type="text" name="reality" id="url" value="<?php echo ($show["ex_reality"]); ?>" />

  </li>


  <li>

   <label for="earnings">备注(可不填写)</label>

   <input type="text" name="explain" id="earnings" value="<?php echo ($show["ex_explain"]); ?>" />

  </li>

  <li>
    
    <input type="hidden" name="id" value="<?php echo ($show["id"]); ?>">

    <div class="table-but"><input type="submit" name="button" id="button" value="确 认 操 作"></div>

  </li>



  </form>

</ul>




</div>


</body>
</html>