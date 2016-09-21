<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>基于Bootstrap的jQuery开关按钮组合DEMO演示-爱编程w2bc.com</title>
    <link rel="stylesheet" type="text/css" href="/~liudeshan/Dashboard/src/Public/plugins/switch/css/default.css">
    <link href="/~liudeshan/Dashboard/src/Public/plugins/switch/docs/css/bootstrap.min.css" rel="stylesheet">
    <link href="/~liudeshan/Dashboard/src/Public/plugins/switch/docs/css/highlight.css" rel="stylesheet">
    <link href="/~liudeshan/Dashboard/src/Public/plugins/switch/css/bootstrap3/bootstrap-switch.css" rel="stylesheet">
    <link href="/~liudeshan/Dashboard/src/Public/plugins/switch/css/docs.min.css" rel="stylesheet">
    <link href="/~liudeshan/Dashboard/src/Public/plugins/switch/docs/css/main.css" rel="stylesheet">
    <style type="text/css">
        body {
            font-family: "Segoe UI", "Lucida Grande", Helvetica, Arial, "Microsoft YaHei", FreeSans, Arimo, "Droid Sans", "wenquanyi micro hei", "Hiragino Sans GB", "Hiragino Sans GB W3", "FontAwesome", sans-serif;
        }

        .bs-docs-header h1 {
            font-size: 1.5em;
            font-family: "Segoe UI", "Lucida Grande", Helvetica, Arial, "Microsoft YaHei", FreeSans, Arimo, "Droid Sans", "wenquanyi micro hei", "Hiragino Sans GB", "Hiragino Sans GB W3", "FontAwesome", sans-serif;
        }

        .bs-docs-header h1 span {
            display: block;
            font-size: 60%;
            font-weight: 400;
            padding: 0.8em 0 0.5em 0;
            color: #c3c8cd;
        }

        .htmleaf-icon {
            color: #fff;
        }
    </style>
</head>
<body>
<div class="col-sm-6 col-lg-4">
    <p>
        <input id="switch-state" type="checkbox" checked>
    </p>

    <div class="btn-group">
        <button type="button" data-switch-toggle="state" class="btn btn-default">Toggle</button>
        <button type="button" data-switch-set="state" data-switch-value="true" class="btn btn-default">Set true</button>
        <button type="button" data-switch-set="state" data-switch-value="false" class="btn btn-default">Set false</button>
        <button type="button" data-switch-get="state" class="btn btn-default">Get</button>
    </div>

</div>

<script src="/~liudeshan/Dashboard/src/Public/plugins/switch/docs/js/jquery.min.js"></script>
<script src="/~liudeshan/Dashboard/src/Public/plugins/switch/docs/js/bootstrap.min.js"></script>
<script src="/~liudeshan/Dashboard/src/Public/plugins/switch/docs/js/highlight.js"></script>
<script src="/~liudeshan/Dashboard/src/Public/plugins/switch/js/bootstrap-switch.js"></script>
<script src="/~liudeshan/Dashboard/src/Public/plugins/switch/docs/js/main.js"></script>
</body>
</html>