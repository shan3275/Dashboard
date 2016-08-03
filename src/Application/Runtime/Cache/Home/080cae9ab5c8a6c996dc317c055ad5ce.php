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

<div class="title">广告业务汇总数据展示</div>

<style type="text/css">

  .sbox{background:#CCC; padding:5px;}

  .input{border:#FFF solid 1px;}

  option{margin:10px; padding:10px;}

</style>

<div>

  <a href="<?php echo U('ad');?>?num=1&gid=<?php echo ($gid); ?>">每日收益汇总</a>&nbsp;&nbsp;

  <a href="<?php echo U('ad');?>?num=2&gid=<?php echo ($gid); ?>">每周收益汇总</a>&nbsp;&nbsp;


</div>


<?php if($num == 1){ ?>

<img src="<?php echo U('drawXian');?>?gid=<?php echo ($gid); ?>" alt="">

<table class="table" width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr class="first">

    <td width="20%" align="center">时间</td>

    <td width="20%" align="center">单日目标</td>

    <td width="20%" align="center">单日收益</td>

    <td width="20%" align="center">备注</td>

    <td width="20%" align="center">操作</td>

  </tr>
  <?php foreach($advert as $val){ ?>

  <tr class="first">

    <td align="center"><?php echo ($val["date"]); ?></td>

    <td align="center">￥<?php echo ($val["aim"]); ?></td>

    <td align="center">￥<?php echo ($val["reality"]); ?></td>

    <td align="center"><?php echo ($val["explain"]); ?></td>

    <td align="center"><a class="ebit" href="<?php echo U('edit',array('id'=>$val['id'],'gid'=>$gid));?>" onClick="return confirm('确定要修改吗？')">修改</a></td>

  </tr>

  <?php } ?>

</table>

<?php }elseif($num == 2){ ?>

<img src="<?php echo U('drawZhu');?>?gid=<?php echo ($gid); ?>" alt="">

<table class="table" width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr class="first">

    <td width="20%" align="center">时间</td>

    <td width="20%" align="center">周目标</td>

    <td width="20%" align="center">周收益</td>



  </tr>
  <?php foreach($week as $val){ ?>
  <tr class="first">

    <td align="center"><?php echo ($val["monday"]); ?>~<?php echo ($val["sunday"]); ?></td>

    <td align="center">￥<?php echo ($val["aim"]); ?></td>

    <td align="center">￥<?php echo ($val["reality"]); ?></td>

   


  </tr>
  <?php } ?>
</table>


<?php } ?>

<?php echo ($page); ?>






</body>
</html>