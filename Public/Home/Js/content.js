;$(function(){
	//获取所需节点
	var more1 = document.getElementById('more1');
	var menu_classes = document.getElementById('menu_classes');
	var menu_veg = document.getElementById('menu_veg');
	var more2 = document.getElementById('more2');
	var menu_pri = document.getElementById('menu_pri');
	var more3 = document.getElementById('more3');
	var menu_snack = document.getElementById('menu_snack');
	var close1 = document.getElementById('close1');
	var close2 = document.getElementById('close2');
	var close3 = document.getElementById('close3');


	//鼠标按下更多1，menu_classes隐藏
	more1.onclick=function(){
		menu_classes.style.display='none';
		menu_veg.style.display='block';
	}
	//鼠标按下更多2，menu_classes隐藏
	more2.onclick=function(){
		menu_classes.style.display='none';
		menu_pri.style.display='block';
	}
	//鼠标按下更多3，menu_classes隐藏
	more3.onclick=function(){
		menu_classes.style.display='none';
		menu_snack.style.display='block';
	}
	//鼠标按下返回1，menu_classes显示
	close1.onclick=function(){
		menu_classes.style.display='block';
		menu_veg.style.display='none';
	}
	//鼠标按下返回2，menu_classes显示
	close2.onclick=function(){
		menu_classes.style.display='block';
		menu_pri.style.display='none';
	}
	//鼠标按下返回3，menu_classes显示
	close3.onclick=function(){
		menu_classes.style.display='block';
		menu_snack.style.display='none';
	}
});