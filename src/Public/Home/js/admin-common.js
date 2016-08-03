// JavaScript Document
$(function(){
	//折叠菜单
	$('.nav-table span').click(function(){
		$('.nav-table span').removeClass()
		$(this).addClass('on')
		var show = $(this).attr('href')
		$('.input-box ul').hide()
		$('#'+show).show()
	})
})