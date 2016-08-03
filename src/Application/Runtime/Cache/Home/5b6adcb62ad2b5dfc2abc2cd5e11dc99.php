<?php if (!defined('THINK_PATH')) exit();?><!doctype html>

<html>

<head>

<meta charset="utf-8">

<title>海妖科技业务汇总系统登陆</title>

<meta name="robots" content="nofollow" />

<meta name=”viewport” content=”width=device-width, initial-scale=1, maximum-scale=1″>

<link href="/hybusi/Public/Home/css/admin-login.css" rel="stylesheet" type="text/css" />

<script language="javascript" type="text/javascript" src="/hybusi/Public/Static/js/jquery.js"></script>

<script language="javascript" type="text/javascript" src="/hybusi/Public/Home/js/placeholder.js"></script>

<script language="javascript" type="text/javascript" src="/hybusi/Public/Static/layer/layer.js"></script>

<script language="javascript" type="text/javascript">

$(function(){

	$('input').placeholder({isUseSpan:true});

	var mt = document.documentElement.clientHeight - $('#form').height() - 100 - $('.logo').height() 

	$('.logo').css('marginTop',mt/2)

	$('#user').focus()

})

function check(){

	$.post("<?php echo U('loginok');?>",{user:$('#user').val(),pwd:$('#pwd').val()},function(data){

		if(data != 'ok'){

			$.layer({

			  shade: [0.5,'#000'],

			  area: ['300px','auto'],

			  dialog: {

				  msg: data,   

				  type: 8,

			  }

		  });

		}else{

			location.href = "<?php echo U('Index/index');?>"

		}

	})

	return false;

}

</script>

</head>



<body>



<div class="logo">海妖科技业务汇总系统</div>

<form id="form" name="form" method="post" action="" onsubmit="return check()">

    <div class="form-group">

    <input type="text" name="user" id="user" placeholder="账号" value="" />

    </div>

    <div class="form-group">

    <input type="password" name="pwd" id="pwd" placeholder="密码" value="" />

    </div> 

    <div class="form-group">

    <input type="submit" name="button" id="button" value="登       录" />

    </div>

</form>





</body>

</html>