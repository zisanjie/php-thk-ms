<?php if (!defined('THINK_PATH')) exit(); if(!session('?mid')){?>
    <script type="text/javascript">window.location.href="__APP__/Index/index";</script>
<?php }?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>快达汽车管理</title>
<link rel="stylesheet" href="__PUBLIC__/Admin/tpl/css/style.default.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/Admin/tpl/css/style.<?php echo (session('color')); ?>.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/Admin/tpl/prettify/prettify.css" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/Admin/tpl/prettify/prettify.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/tpl/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/tpl/js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/tpl/js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/tpl/js/jquery.flot.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/tpl/js/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/tpl/js/bootstrap.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/tpl/js/jquery.cookie.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/tpl/js/custom.js"></script>
<script src="__PUBLIC__/Admin/Js/jquery-1.8.3.js"></script>
<script type="text/javascript">
	function startTime(){
	        var today=new Date();
	        var Y = today.getFullYear();
	        var M = today.getMonth()+1;
	        var D = today.getDate();
	        var h=today.getHours();
	        var m=today.getMinutes();
	        var s=today.getSeconds();
	       
	        M=checkTime(M);
	        m=checkTime(m);
	        s=checkTime(s);
	        document.getElementById('txt').innerHTML=Y+'-'+M+'-'+D+'　'+h+":"+m+":"+s;
	        t=setTimeout('startTime()',500);
	}

	function checkTime(i){
		if (i<10) {
			i="0" + i;
		}

		return i;
	}
</script>
</head>
<script>
    $(function(){

        $('.skin-color').click(function(){

            $('head').append("<link id='skinstyle' rel='stylesheet' href='__PUBLIC__/Admin/tpl/css/style."+$(this).attr('href')+".css' type='text/css' />");   

            $.post('__URL__/changecolor',{'color':$(this).attr('href')},function(data){
                // alert(data);
                        
            });
            return false;
        });
    });
</script>
<body onload = "startTime();">

<div class="mainwrapper">

    <!-- <script type="text/javascript" src="__PUBLIC__/Js/jquery-1.8.3.js"></script> -->
<script type="text/javascript">
    // $(function(){
    //     $('input:text,textarea,input:password').blur(function(){
    //         $(this).nextAll('.nowADD').remove();
    //         if(!$(this).val()){
    //                 if('start_time' == $(this).attr('name')){
    //                         $(this).next().after('<font color="red" class="nowADD">数据不可为空</font>');
    //                 }else{
    //                 $(this).after('<font color="red" class="nowADD">数据不可为空</font>');
    //                 }
    //         }else{
    //                 if(('price' == $(this).attr('name') && isNaN($(this).val())) || ('orderno' == $(this).attr('name') && isNaN($(this).val()))){
    //                     $(this).after('<font color="red" class="nowADD">必须是数字</font>');
    //                 }else{
    //                     if('start_time' != $(this).attr('name') && 'start_time' != $(this).attr('name')){
    //                     $(this).after('<font color="green" class="nowADD">输入正确</font>');
    //                     }
    //                 }
    //         }
            
    //     });
    // });
</script>
    <div class="leftpanel">
    	
        <div class="logopanel">
        	<h1><a href="__APP__/Index/index/"><?php echo ($webData["title"]); ?> <span>v1.0</span></a></h1>
        </div><!--logopanel-->
        
        <div class="datewidget" id="txt"></div>
        <div class="searchwidget" style="height:36px;"></div><!--searchwidget-->

        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
            	<li class="nav-header">主菜单</li>
                    <li class="active">
                        <a href="__APP__/Index/main">
                            <span class="icon-home"></span> 控制面板
                        </a>
                    </li>
               <?php if($_SESSION['mroles']== 1 or $_SESSION['mroles']== 2 or $_SESSION['mroles']== 4 ): ?><li class="dropdown"><a href=""><span class="icon-user"></span> 用户管理</a>
                	<ul>
                    	   <li><a href="__APP__/Users/listPage">普通组&nbsp;---&nbsp;列表</a></li>
                        <li><a href="__APP__/Users/listManage">管理组&nbsp;---&nbsp;列表</a></li>
                        <li><a href="__APP__/Users/addManage">管理组&nbsp;---&nbsp;添加</a></li>
                    </ul>
                </li><?php endif; ?>

                <?php if($_SESSION['mroles']== 1 or $_SESSION['mroles']== 2): ?><li class="dropdown"><a href=""><span class="icon-calendar"></span> 酒店管理</a>
                    <ul>
                        <li><a href="__APP__/Hotels/listPage">酒店列表</a></li>
                        <li><a href="__APP__/Hotels/addHotel">酒店组&nbsp;---&nbsp;添加</a></li>
                    </ul>
                </li><?php endif; ?>
                <?php if($_SESSION['mroles']== 1 or $_SESSION['mroles']== 2): ?><li class="dropdown"><a href=""><span class="icon-th"></span> 单位管理</a>
                    <ul>
                        <li><a href="__APP__/Departments/listPage">单位列表</a></li>
                        <li><a href="__APP__/Departments/addDepartment">单位组&nbsp;---&nbsp;添加</a></li>
                    </ul>
                </li><?php endif; ?>
                <?php if($_SESSION['mroles']== 1 or $_SESSION['mroles']== 2): ?><li class="dropdown"><a href=""><span class="icon-th"></span> 客户管理</a>
                    <ul>
                        <li><a href="__APP__/Customers/listPage">客户列表</a></li>
                        <li><a href="__APP__/Customers/addCustomer">客户组&nbsp;---&nbsp;添加</a></li>
                    </ul>
                </li><?php endif; ?>

                <?php if($_SESSION['mroles']== 1 or $_SESSION['mroles']== 2): ?><li class="dropdown"><a href=""><span class="icon-user"></span> 权限管理</a>
                    <ul>
                        <li><a href="__APP__/Roles/listPage">权限列表</a></li>
                        <!-- <li><a href="__APP__/Roles/addPage">添加权限</a></li> -->
                        <li><a href="__APP__/Roles/addAdmin">添加用户</a></li>
                    </ul>
                </li><?php endif; ?>
                <?php if($_SESSION['mroles']== 1 or $_SESSION['mroles']== 3): ?><li class="dropdown"><a href=""><span class="icon-th-list"></span> 分类管理</a>
                	<ul>
                    	   <li><a href="__APP__/Bclass/selBclass">一级分类&nbsp;---&nbsp;列表</a></li>
                        <li><a href="__APP__/Bclass/addBclass">一级分类&nbsp;---&nbsp;添加</a></li>
                        <li><a href="__APP__/Sclass/selSclass">二级分类&nbsp;---&nbsp;列表</a></li>
                        <li><a href="__APP__/Sclass/addSclass">二级分类&nbsp;---&nbsp;添加</a></li>
                    </ul>
                </li>

                <li class="dropdown"><a href=""><span class="icon-th"></span> 车辆管理</a>
                	<ul>
                    	   <li><a href="__APP__/Foods/selFoods">列表</a></li>
                        <li><a href="__APP__/Foods/addFoods">添加</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href=""><span class="icon-th"></span> 优惠管理</a>
                    <ul>                        
                        <li><a href="__APP__/Foods/showFav">新优惠</a></li>
                        <li><a href="__APP__/Foods/addFav">添加优惠</a></li>
                        <li><a href="__APP__/Foods/listFav">历史记录</a></li>
                    </ul>
                </li><?php endif; ?>
                <?php if($_SESSION['mroles']== 1 or $_SESSION['mroles']== 5): ?><li class="dropdown"><a href=""><span class="icon-bell"></span> 订单管理</a>
                    <ul>
                        <li><a href="__APP__/Forms/new_forms">新订单</a></li>                        
                        <li><a href="__APP__/Forms/listPage">历史订单</a></li>
                        <!-- <li><a href="#">稽查订单</a></li> -->
                    </ul>
                </li><?php endif; ?>
               <?php if($_SESSION['mroles']== 1 or $_SESSION['mroles']== 8): ?><li class="dropdown"><a href=""><span class="icon-comment"></span> 车辆评论</a>
                	<ul>
                    	   <li><a href="__APP__/Evaluate/evaluateList">评论列表</a></li>
                        <!-- <li><a href="#">统计</a></li> -->
                    </ul>
                </li><?php endif; ?>
                <?php if($_SESSION['mroles']== 1 or $_SESSION['mroles']== 2 or $_SESSION['mroles']== 4): ?><li class="dropdown"><a href=""><span class="icon-ban-circle"></span> IP管理</a>
                	<ul>
                    	<li><a href="__APP__/Ip/listPage">禁用IP</a></li>
                        <li><a href="__APP__/Ip/addPage">添加IP</a></li>
                    </ul>
                </li><?php endif; ?>
                <?php if($_SESSION['mroles']== 1 or $_SESSION['mroles']== 2): ?><li class="dropdown"><a href=""><span class="icon-file"></span> 日志管理</a>
                    <ul>
                        <li><a href="__APP__/Logs/showLogs">日志列表</a></li>
                        <!-- <li><a href="#">导出日志</a></li> -->
                    </ul>
                </li>

                <li class="dropdown"><a href=""><span class="icon-globe"></span> 友情链接</a>
                	<ul>
                    	<li><a href="__APP__/Friendlinks/listLinks">链接列表</a></li>
                        <li><a href="__APP__/Friendlinks/addLinks">添加链接</a></li>
                    </ul>
                </li>
                
                <li class="dropdown"><a href=""><span class="icon-globe"></span> 站点信息</a>
                    <ul>
                        <li><a href="__APP__/Webconfig/sysinfo">系统信息</a></li>
                        <li><a href="__APP__/Webconfig/webedit">站点配置</a></li>
                    </ul>
                </li><?php endif; ?>
            </ul>
        </div><!--leftmenu-->
        
    </div><!--mainleft-->
    <!-- END OF LEFT PANEL
    
    <!-- START OF RIGHT PANEL -->
    <div class="rightpanel">
        <div class="headerpanel">
        	  <a href="" class="showmenu"></a>
            <div class="headerright">
           <!-- 	<div class="dropdown notification">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="/page.html">
                    	<span class="iconsweets-globe iconsweets-white"></span>
                    </a>
                    <ul class="dropdown-menu">
                    	<li class="nav-header">新消息</li>
                        <li>
                            <a href=""><span class="icon-envelope">
                            </span>来自 <strong>Jack</strong> <small class="muted"> - 19 hours ago</small></a>
                        </li>
                        <li>
                            <a href=""><span class="icon-envelope"></span> 来自 <strong>Daniel</strong> <small class="muted"> - 2 days ago</small></a>
                        </li>                        
                        <li class="viewmore"><a href="">View More Notifications</a></li>
                    </ul>
                </div><!--dropdown-->
                
    	     <div class="dropdown userinfo">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="/page.html">Hi, <?php echo (session('mname')); ?>! <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    <!--     <li><a href=""><span class="icon-eye-open"></span> Privacy Settings</a></li> 
                        <li class="divider"></li>-->
                        <li><a href="__APP__/Public/logout"><span class="icon-off"></span> Sign Out</a></li>
                    </ul>
                </div><!--dropdown-->
    		
            </div><!--headerright-->
            
</div><!--headerpanel--><!--右边头部-->
        <div class="breadcrumbwidget">
        	<ul class="skins">
                <li><a href="default" class="skin-color default"></a></li>
                <li><a href="orange" class="skin-color orange"></a></li>
                <li><a href="dark" class="skin-color dark"></a></li>
                <li>&nbsp;</li>
                <li class="fixed"><a href="" class="skin-layout fixed"></a></li>
                <li class="wide"><a href="" class="skin-layout wide"></a></li>
            </ul><!--skins-->
        	<ul class="breadcrumb">
                <li><a href="__APP__/Index/main">Home</a> <span class="divider">/</span></li>
                <li class="active">控制面板</li>
            </ul>
        </div><!--breadcrumbwidget-->
      <div class="pagetitle">
        	<h1>控制面板</h1> <span>本页面主要负责显示网站信息</span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
        	<div class="contentinner content-dashboard">
                <div class="alert alert-info">
                	<button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>:--) 欢迎来到我们的网站 -- <?php echo (ucfirst($webData["title"])); ?>!</strong>
                </div><!--alert-->

                <div>
                    <h4 class="widgettitle nomargin">网站简介</h4>
                    <div class="widgetcontent bordered">
                            &nbsp;&nbsp;&nbsp;&nbsp;<?php echo (ucfirst($webData["title"])); ?> 订车系统，拥有大量车辆资源，在这里，您可以找到您想坐的车辆，同时您也可以很方便的进行订车和评论等一系列操作。
                    </div><!--widgetcontent-->
                </div>
                <div class="row-fluid"> 
               <!-- 	<div class="span8">-->
                    <?php if($_SESSION['mroles']== 1): ?><ul class="widgeticons row-fluid">
                    	<li class="one_fifth">
                        <a href="__APP__/Users/listPage/">
                            <img src="__PUBLIC__/Admin/tpl/img/gemicon/users.png"/>
                            <span>用户管理</span>
                        </a>
                    </li>
                            <li class="one_fifth">
                        <a href="__APP__/Hotels/listPage/">
                            <img src="__PUBLIC__/Admin/tpl/img/gemicon/hotel.png"/>
                            <span>酒店管理</span>
                        </a>
                    </li>  
                    <li class="one_fifth">
                        <a href="__APP__/Departments/listPage/">
                            <img src="__PUBLIC__/Admin/tpl/img/gemicon/department.png"/>
                            <span>单位管理</span>
                        </a>
                    </li>  
                    <li class="one_fifth">
                        <a href="__APP__/Customers/listPage/">
                            <img src="__PUBLIC__/Admin/tpl/img/gemicon/customer.png"/>
                            <span>客户管理</span>
                        </a>
                    </li>
                    	<li class="one_fifth">
                        <a href="__APP__/Bclass/selBclass/">
                            <img src="__PUBLIC__/Admin/tpl/img/gemicon/image.png"/>
                            <span>分类管理</span>
                        </a>
                    </li>                    	
                    	<li class="one_fifth">
                        <a href="__APP__/Foods/selFoods/">
                            <img src="__PUBLIC__/Admin/tpl/img/gemicon/edit.png"/>
                            <span>车辆管理</span>
                        </a>
                    </li>
                    <li class="one_fifth">
                        <a href="__APP__/Forms/listPage/">
                            <img src="__PUBLIC__/Admin/tpl/img/gemicon/calendar.png"/>
                            <span>订单管理</span>
                        </a>
                    </li>
                    	<li class="one_fifth">
                        <a href="__APP__/Foods/showFav/">
                            <img src="__PUBLIC__/Admin/tpl/img/gemicon/archive.png"/>
                            <span>优惠管理</span>
                        </a>
                    </li>
                    	<li class="one_fifth">
                        <a href="__APP__/Evaluate/evaluateList/">
                            <img src="__PUBLIC__/Admin/tpl/img/gemicon/mail.png"/>
                            <span>网站评论</span>
                        </a>
                    </li>
                    <li class="one_fifth">
                        <a href="__APP__/Ip/listPage/">
                            <img src="__PUBLIC__/Admin/tpl/img/gemicon/location.png"/>
                            <span>IP管理</span>
                        </a>
                    </li>
                    <li class="one_fifth">
                        <a href="__APP__/Logs/showLogs/">
                            <img src="__PUBLIC__/Admin/tpl/img/gemicon/reports.png"/>
                            <span>日志管理</span>
                        </a>
                    </li>
                    <li class="one_fifth">
                        <a href="__APP__/Friendlinks/listLinks/">
                            <img src="__PUBLIC__/Admin/tpl/img/gemicon/notify.png"/>
                            <span>友情链接</span>
                        </a>
                    </li>
                    <li class="one_fifth last">
                        <a href="__APP__/Webconfig/sysinfo/">
                            <img src="__PUBLIC__/Admin/tpl/img/gemicon/settings.png"/>
                            <span>网站配置</span>
                        </a>
                    </li>           
                    </ul>

                        <br /><?php endif; ?>
                   <!-- </div> -->
                    <!-- <div class="span4">                    	    -->
                      <!--   <h4 class="widgettitle nomargin">日历</h4>
                                          <div class="widgetcontent">
                                              <div id="calendar" class="widgetcalendar"></div>
                                          </div>     -->                    
                    <!-- </div> -->
                </div><!--row-fluid-->
            </div><!--contentinner-->
        </div><!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
    
    <div class="clearfix"></div>
    
    <div class="footer">
    	<div class="footerleft">快达租赁管理 v1.0</div>
    	<div class="footerright">&copy; twen_Yee </div>
    </div><!--footer-->

    
</div><!--mainwrapper-->
<script type="text/javascript">
jQuery(document).ready(function(){
								
		// basic chart
		/*var flash = [[0, 2], [1, 6], [2,3], [3, 8], [4, 5], [5, 13], [6, 8]];
		var html5 = [[0, 5], [1, 4], [2,4], [3, 1], [4, 9], [5, 10], [6, 13]];
			
		function showTooltip(x, y, contents) {
			jQuery('<div id="tooltip" class="tooltipflot">' + contents + '</div>').css( {
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 5
			}).appendTo("body").fadeIn(200);
		}*/
	
		var previousPoint = null;
		jQuery("#chartplace2").bind("plothover", function (event, pos, item) {
			jQuery("#x").text(pos.x.toFixed(2));
			jQuery("#y").text(pos.y.toFixed(2));
			
			if(item) {
				if (previousPoint != item.dataIndex) {
					previousPoint = item.dataIndex;
						
					jQuery("#tooltip").remove();
					var x = item.datapoint[0].toFixed(2),
					y = item.datapoint[1].toFixed(2);
						
					showTooltip(item.pageX, item.pageY,
									item.series.label + " of " + x + " = " + y);
				}
			
			} else {
			   jQuery("#tooltip").remove();
			   previousPoint = null;            
			}
		
		});
		
		jQuery("#chartplace2").bind("plotclick", function (event, pos, item) {
			if (item) {
				jQuery("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
				plot.highlight(item.series, item.datapoint);
			}
		});
		
		// calendar
		jQuery('#calendar').datepicker();

		// change skin color
		jQuery('.skin-color').click(function(){
		var s = jQuery(this).attr('href');
		if(jQuery('#skinstyle').length > 0) {
			if(s!='default') {
				jQuery('#skinstyle').attr('href','__PUBLIC__/Admin/tpl/css/style.'+s+'.css');	
				jQuery.cookie('skin-color', s, { path: '/' });
			} else {
				jQuery('#skinstyle').remove();
				jQuery.cookie("skin-color", '', { path: '/' });
			}
		} else {
			if(s!='default') {
				jQuery('head').append('<link id="skinstyle" rel="stylesheet" href="__PUBLIC__/Admin/tpl/css/style.'+s+'.css" type="text/css" />');
				jQuery.cookie("skin-color", s, { path: '/' });
			}
		}
		return false;
	});

	// load selected skin color from cookie
	if(jQuery.cookie('skin-color')) {
		var c = jQuery.cookie('skin-color');
		if(c) {
			jQuery('head').append('<link id="skinstyle" rel="stylesheet" href="__PUBLIC__/Admin/tpl/css/style.'+c+'.css" type="text/css" />');
			jQuery.cookie("skin-color", c, { path: '/' });
		}
	}


});
</script>
</body>
</html>