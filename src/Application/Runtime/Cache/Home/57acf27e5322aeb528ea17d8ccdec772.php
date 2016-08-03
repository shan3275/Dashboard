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


<script>

$(function(){

	$("tr:even").css('background','#eee')

})

</script>

<div class="title">业务汇总数据展示</div>

<style type="text/css">

  .sbox{background:#CCC; padding:5px;}

  .input{border:#FFF solid 1px;}

  option{margin:10px; padding:10px;}

</style>

<div>

  <a href="<?php echo U('ad');?>?num=1">每日收益汇总表</a>&nbsp;&nbsp;

  <a href="<?php echo U('ad');?>?num=2">每周收益汇总表</a>&nbsp;&nbsp;


</div>

<?php if($num == 1){ ?>
<table class="table" width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr class="first">

    <td width="10%" align="center">时间</td>

    <?php foreach($gather as $val){ ?>

    <td width="10%" align="center"><?php echo ($val["name"]); ?>业务目标</td>

    <td width="10%" align="center"><?php echo ($val["name"]); ?>业务收益</td>

    <?php } ?>

    <td width="10%" align="center">总业务目标</td>

    <td width="10%" align="center">总业务收益</td>

    
  </tr>

  <?php foreach($list as $key => $val){ ?>

  <tr class="first">

    <td width="10%" align="center"><?php echo ($key); ?></td>

    <?php foreach($gather as $v){ ?>
    
    <td width="10%" align="center">￥<?php echo ($val[$v['id']]["aim"]); ?></td>

    <td width="10%" align="center">￥<?php echo ($val[$v['id']]["reality"]); ?></td>

    <?php } ?>

    <td width="10%" align="center">￥<?php echo ($val["aim"]); ?></td>

    <td width="10%" align="center">￥<?php echo ($val["reality"]); ?></td> 

  </tr>

  <?php } ?>


</table>

<?php foreach($gather as $val){ ?>

<img src="<?php echo U('drawXian');?>?gid=<?php echo ($val["id"]); ?>" alt="">

<?php } ?>

<?php }elseif($num == 2){ ?>
<table class="table" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr class="first">

    <td width="10%" align="center">时间</td>

    <?php foreach($gather as $val){ ?>

    <td width="10%" align="center"><?php echo ($val["name"]); ?>业务周目标</td>

    <td width="10%" align="center"><?php echo ($val["name"]); ?>业务周收益</td>

    <?php } ?>



    <td width="10%" align="center">总业务周目标</td>

    <td width="10%" align="center">总业务周收益</td>

  </tr>

  <?php foreach($listw as $key => $val){ ?>
  
  <tr class="first">

    <td width="10%" align="center"><?php echo ($key); ?></td>

    <?php foreach($gather as $v){ ?>
    
    <td width="10%" align="center">￥<?php echo ($val[$v['id']]["aim"]); ?></td>

    <td width="10%" align="center">￥<?php echo ($val[$v['id']]["reality"]); ?></td>

    <?php } ?>

    <td width="10%" align="center">￥<?php echo ($val["aim"]); ?></td>

    <td width="10%" align="center">￥<?php echo ($val["reality"]); ?></td> 

  </tr>

  <?php } ?>

</table>


<img src="<?php echo U('drawZhu');?>" alt="">
<?php } ?>

<?php echo ($page); ?>






</body>
</html>