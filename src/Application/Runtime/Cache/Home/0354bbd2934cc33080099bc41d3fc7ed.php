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

<div class="title">

  广告业务汇总数据添加&nbsp;&nbsp;&nbsp;

</div>




<table class="table" width="100%" border="0" cellspacing="5" cellpadding="0">

  <tr class="first">

    <td width="15%" align="center">名称</td>

    <td width="15%" align="center">链接</td>

    <td width="15%" align="center">添加时间</td>

    <td width="15%" align="center">修改时间</td>

    <td width="14%" align="center">状态</td>

    <td width="14%" align="center">操作</td>

  </tr>

  <?php if(is_array($link)): $i = 0; $__LIST__ = $link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>

      <td align="center"><?php echo ($list['title']); ?></td>

      <td align="center">

        <a href="<?php echo ($list['url']); ?>" target="_blank"><?php echo ($list['url']); ?></a>

      </td>

      <td align="center"><?php echo date("Y-m-d H:i:s",$list['create_time']);?></td>

      <td align="center">

        <?php if(($list['update_time']) == "0"): ?>未进行修改操作<?php else: echo date("Y-m-d H:i:s",$list['update_time']); endif; ?>

      </td>

      <td align="center">

        <?php if(($list["status"]) == "0"): ?>未审核<?php else: ?>已审核<?php endif; ?>

      </td>

      <td align="center">

        <a href="<?php echo U('edit',array('id'=>$list['id']));?>">修改</a> 

        <a href="<?php echo U('del',array('id'=>$list['id']));?>" onClick="return confirm('确定要删除吗？')">删除</a>

      </td>

    </tr><?php endforeach; endif; else: echo "" ;endif; ?>

</table>

<?php echo ($page); ?>




</body>
</html>