安装部署说明
1.首先确保部署的服务器支持php，测试可以在web目录放置test.php文件，文件内容：
<?php echo phpinfo(); ?>
在web中打开该文件，如果能显示php相关信息，表示环境部署成功，否则需要配置环境确保php服务ok。
2.确保部署服务器安装mysql服务；
3.安装部署所有文件全部在该目录下面，将该目录下面所有文件拷贝到web目录。（appache服务器在/val/www/html目录中）
4.导入数据库，数据库配置文件为crm.sql。
5.修改数据库配置文件,配置文件路径为：Application/Common/Conf/config.php,填入正确的数据库访问信息。
6.在Application目录中创建Runtime目录，并赋予权限777.
7.部署成功之后，打开页面，默认登录用户名：shan275, 密码：a123456

