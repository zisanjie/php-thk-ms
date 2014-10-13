;$(function(){

	//获取所需节点
	var reg = document.getElementById('reg');
	var login = document.getElementById('login');
	var content = document.getElementById('zhuce');
	var con = document.getElementById('con');
	var close = document.getElementById('close');
	var gb = document.getElementById('gb');


	//鼠标按下注册，弹出注册框
	reg.onclick=function(){
		//点击注册，显示注册窗口
		content.style.display='block';
		//弹出登录框时隐藏背景
		$("body").append("<div id='greybackground'></div>");
		var documentheight = $(window.document).height();
		$("#greybackground").css({'opacity':'0.3', 'height':documentheight});
	}
	//鼠标点击关闭时，隐藏注册框
	close.onclick=function(){
		content.style.display='none';
		$("#greybackground").remove();
	}
	//鼠标按下登录，弹出登录框
	login.onclick=function(){
		//点击登录，显示登录窗口
		con.style.display='block';
		//弹出登录框时隐藏背景
		$("body").append("<div id='greybackground'></div>");
		var documentheight = $(window.document).height();
		$("#greybackground").css({'opacity':'0.3', 'height':documentheight});
	}
	//鼠标点击关闭时，隐藏注册框
	gb.onclick=function(){
		con.style.display='none';
		$("#greybackground").remove();
	}
});