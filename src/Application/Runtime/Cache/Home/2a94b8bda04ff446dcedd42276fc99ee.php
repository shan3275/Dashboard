<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <script>
    function c(){
      x.style.display="none"
    }
  </script>
  <style>
    body {margin:0;color:#000;overflow:hidden;padding:0;height:100%;font-family:Arial}
    a{cursor:pointer;display:block;position:absolute;border:1px;border-radius:1em;background-color:#555;color:#eee;z-index:3;right:5px;top:5px;line-height:20px;text-align:center;width:20px;font-size:10px}
    #x{position:absolute;width:300px;height:250px}
    .close{cursor:pointer;display:block;position:absolute;border:1px;border-radius:1em;background-color:#555;color:#eee;z-index:3;right:5px;top:5px;line-height:20px;text-align:center;width:20px;font-size:10px}
  </style>
</head>
<body>
<div id=x>
  <iframe src=<?php echo ($url); ?> width=300 height=250 scrolling=no frameborder=0></iframe>
  <a class="close" onClick=c()>关闭</a>
</div>

</body>
</html>