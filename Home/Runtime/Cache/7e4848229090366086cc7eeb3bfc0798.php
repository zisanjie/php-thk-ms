<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title><?php echo ($webData["title"]); ?></title>
		<link rel="shortcut icon" href=" __PUBLIC__/Imgs/bitbug_favicon.ico" />
		<link href="__PUBLIC__/Home/Css/header.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="__PUBLIC__/Admin/tpl/css/bootstrap.min.css" type="text/css" />
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
		<script src="__PUBLIC__/Admin/tpl/js/jquery-1.9.1.min.js"></script> 
		<!-- Include all compiled plugins (below), or include individual files as needed --> 
		<script src="__PUBLIC__/Admin/tpl/js/bootstrap.min.js"></script>
	
	</head>
	<body style="background:#F2F2F2;">
		<div id="header_top" class="navbar">
			<div class="navbar-inner">
			<a class=""><img src="__ROOT__/Uploads/thumb/th_<?php echo ($webData["logo"]); ?>" style="float:left;" width="150"></a>
			<ul id="header_ul" class="nav">
				<li><a href="__APP__/Index/index/">首页</a></li>
				<li><a href="__APP__/Bclass/index/">车辆分类</a></li>
			</ul>
		<!-- 	<form action="__APP__/Index/searchFoods" method="post">
			<input type="text" class="input-medium search-query" placeholder="输入搜索…" id="header_seach" name="fname">
			<input type="submit" id="header_sub" class="btn btn-primary" value="搜索">
		</form> -->
			<form class="form-search" action="__APP__/Index/searchFoods" method="post">
			  <div class="input-append" id="header_seach">
			    <input type="text" name="fname" class="span2 search-query input-medium" placeholder="输入搜索…" style="float:left;width:250px;height:25px;">
			    <button style="height:35px;" type="submit" class="btn"><i class="icon-search"></i></button>
			  </div>
			</form>
			<div id="header_login">
			<?php if(empty($_SESSION['uname'])): ?><!-- <span>
						<a href="__APP__/Login/login/" target="_blank">
							登录
						</a>
						<a href="#myModal" data-toggle="modal">登录</a>
					</span>
					<span>
						<a href="__APP__/Login/reg/" target="_blank">
							注册
						</a>
					</span> -->

					<form class="form-inline" action="__APP__/Login/checkLogin/" method="post">
					  <input type="text" class="input-small" placeholder="用户名" name="username">
					  <input type="password" class="input-small" placeholder="密码" name="userpwd">
					  <!-- <label class="checkbox">
					    <input type="checkbox" name="jizhu">记住我
					  </label> -->
					  <button type="submit" class="btn btn-primary" style="margin-top:-2px;">登录</button>
					  <a href="__APP__/Login/reg/" target="_blank">注册</a>
						<a href="__APP__/Login/safe/" style="margin-left:0px;text-decoration:none;color:#992222;font-size:13px;">忘记密码?</a>
					</form>
			<?php else: ?>				
				<span>
					<a href="">
					<?php echo (session('uname')); ?>
					</a>
				</span>
				<?php if(!empty($_SESSION['uheadpic'])): ?><span>
					<a href="__APP__/Ucenter/index/pass">
					个人中心
					</a>
				</span><?php endif; ?>
				<?php if(!empty($_SESSION['ureceiving'])): ?><span>
					<a href="__APP__/Hcenter/index/pass">
					酒店中心
					</a>
				</span><?php endif; ?>
				<?php if(!empty($_SESSION['uhotel'])): ?><span>
					<a href="__APP__/Dcenter/index/pass">
					单位中心
					</a>
				</span><?php endif; ?>
				<span>
					<a href="__APP__/Carts/showCarts/">
					购物车
					</a>
				</span>
				<?php if(!empty($_SESSION['uMsg'])): ?><span>
					<a href="__APP__/Posts/details/form_number/<?php echo (session('uMsg')); ?>" class="clearMsg">
					新订单
					</a>
				</span><?php endif; ?>
				<span style="font-size:14px;">
					<a href="__APP__/Public/loginout/">
					退出
					</a>
				</span><?php endif; ?>
			</div>
		  </div>	
		</div>

		<!-- Modal -->
		<!-- <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 			<div class="modal-header">
    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    		<h3 id="myModalLabel">请登入</h3>
  		</div>
  		<div class="modal-body">
  			 <form class="form-horizontal" action="__APP__/Login/checkLogin/" method="post">
  			  <div class="control-group">
  			    <label class="control-label" for="inputEmail">用户名：</label>
  			    <div class="controls">
  			      <input type="text" id="inputEmail" placeholder="输入用户名" name="username">
  			    </div>
  			  </div>
  			  <div class="control-group">
  			    <label class="control-label" for="inputPassword">密&nbsp;&nbsp;&nbsp;&nbsp;码：</label>
  			    <div class="controls">
  			      <input type="password" id="inputPassword" placeholder="输入密码" name="userpwd">
  			    </div>
  			  </div>
  			  <div class="control-group">
  			    <div class="controls">
  			      <label class="checkbox">
  			        <input type="checkbox" name="jizhu"> 记住我
  			        <a href="__APP__/Login/safe/" style="margin-left:80px;text-decoration:none;color:#992222;font-size:13px;">忘记密码?</a>
  			      </label>

  			      <button type="submit" class="btn">登入</button>
  			    </div>
  			  </div>
  			</form>
  		</div>
  		<div class="modal-footer">
   	 		<button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
  		</div>
		</div> -->

		<div style="clear:both;height:30px;"></div>
	</body>
</html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title><?php echo ($webData["title"]); ?></title>
		<script src="__PUBLIC__/Js/jquery-1.8.3.js"></script>
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/Css/index_index.css">
		<link rel="stylesheet" href="__PUBLIC__/Admin/tpl/css/bootstrap.min.css" type="text/css" />
		<!-- Include all compiled plugins (below), or include individual files as needed --> 
		<script src="__PUBLIC__/Admin/tpl/js/bootstrap.min.js"></script>
		<script>
		$(function(){
			// 用户名获得焦点时的JS代码
			$("#loginuser").focus(function(){
				$('#name').css('border', '#B24422 1px solid');
				$('#nameimg').attr('src', '__PUBLIC__/Home/Imgs/20140106114505.jpg');
				$(this).css({'outline':'none','color':'black'});
			});
			// 用户名失去焦点时的JS代码
			$("#loginuser").blur(function(){
				$('#name').css('border', '#DEDEDE 1px solid');
				$('#nameimg').attr('src', '__PUBLIC__/Home/Imgs/20140106114606.jpg');
				$(this).css({'outline':'none','color':'#666666'});
			});
			// 密码框获得焦点时的JS代码
			$("input[name=userpwd2]").focus(function(){
			    $(this).hide();
			    $("#login_password_index").show().focus();
				$('#pwd').css('border', '#B24422 1px solid');
				$('#pwdimg').attr('src', '__PUBLIC__/Home/Imgs/20140106114542.jpg');
				$(this).css({'outline':'none', 'color':'#666666'});
			});
			$("#login_password_index").focus(function(){
				$('#pwd').css('border', '#2EA574 1px solid');
				$('#pwdimg').attr('src', '__PUBLIC__/Home/Imgs/20140106114542.jpg');
				$(this).css({'outline':'none', 'color':'black'});
			});
			// 密码框失去焦点时的JS代码
			$("#login_password_index").blur(function(){
				$('#pwd').css('border', '#DEDEDE 1px solid');
				$('#pwdimg').attr('src', '__PUBLIC__/Home/Imgs/20140106114642.jpg');
				$(this).css('color', '#ccc');

				if ($(this).val() == "") { 
		          			$("input[id=loginpwd]").show(); 
		          			$("input[name=userpwd]").hide(); 
         				} 
			});

			/* 图片轮播开始 */
			var pic = 0;
			
			timer = setInterval(function(){
				var length = $('#right_l input').length;
				
				pic++;				
				pic = pic>length?0:pic;

				var imgurl = $('#right_l input:eq('+pic+')').val();
				var id = $('#right_l input:eq('+pic+')').attr('class');
				var url = '__APP__/Foods/details/id/'+id;
				$('#right_l img').attr({src:imgurl});
				$('#right_l a').attr({href:url});					
			},3000);
			/* 图片轮播结束 */

			/*添加到购物车Ajax*/
			$('.addCarts').click(function(){
				
				var fid = $(this).attr('alt');				
				var url = '__APP__/Carts/setCarts/';
				var nowobj = $(this);
				$.post(url,{id:fid},function(cdata){

					if('YES' == cdata.data){
	                                                	
	                                            	nowobj.text('已添加');
	                                        	}else if('NO' == cdata.data){
	                                        		nowobj.text('已存在');                   		
	                                        	}else{                                      		
	                                        		if(!confirm('您还没有登录,去登录吗?')){
                                    				return false;
                                				}
	                                        		//window.location.href = "__APP__/Login/login/";
	                                        		$('#myModal').modal('show');
	                                        	}

				});
			});

		});
		</script>
	</head>
	<body>		
		<div id="index_main">
			<!-- main left start -->
			<div id="main_left">
				<div id="left_l">
					<ul class="nav nav-tabs nav-stacked">						
						<?php if(is_array($cdata)): $i = 0; $__LIST__ = $cdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bo): $mod = ($i % 2 );++$i;?><li>				
							<a href="__APP__/Bclass/index/id/<?php echo ($bo["id"]); ?>" class="foods_type" title="<?php echo ($bo["bname"]); ?>" alt="<?php echo ($bo["id"]); ?>">
							<?php echo ($bo["bname"]); ?>
							</a>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
						<li>
							<a href="__APP__/Bclass/index/" class="foods_type" title="查看更多分类信息">更多...</a>
						</li>
					</ul>
					<!-- <div style="clear:both;height:30px;"></div> -->
					<ul class="nav nav-tabs nav-stacked">
						<li><a href="__APP__/Bclass/index/" id="index_sclass">全部车辆分类</a></li>
					</ul>

					<ul class="nav nav-tabs nav-stacked">
						<li><a href="__APP__/Bclass/index/" id="index_sclass">合作酒店介绍</a></li>
						<li><a href="__APP__/Bclass/index/" id="index_sclass">合作单位介绍</a></li>
					</ul>
				</div>

				<div id="right_l">
					<a href="__APP__/Foods/details/id/<?php echo ($favdata[0]['id']); ?>"><img src="__ROOT__/Uploads/Foods/<?php echo ($favdata[0]['pic']); ?>" style="width:550px;height:320px;border-radius:5px;"/></a>
					<?php if(is_array($favdata)): $i = 0; $__LIST__ = $favdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$favvo): $mod = ($i % 2 );++$i;?><input type="hidden" class="<?php echo ($favvo["id"]); ?>" value="__ROOT__/Uploads/Foods/<?php echo ($favvo["pic"]); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>

				<div class="clear_both"></div>

			<div style="float:right;width:550px;padding-bottom:15px;margin-top:20px;background:white;border:#D9D9D9 1px solid;border-radius:5px;">
				<div class="nav_top">
					<span style="color:#909090">新品上架</span>
					<a href="__APP__/Sclass/getFoods/opr/new/" target="__blank">
						<font style="margin-left:10px;color:#B24422;font-size:14px;">
							查看全部
						</font>
					</a>
				</div>
				<div style="height:1px;background:#D9D9D9;margin:0px auto 15px;width:500px;"></div>
				<div id="xinxiu_img">					
					<?php if(is_array($newfoods)): $i = 0; $__LIST__ = $newfoods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nvo): $mod = ($i % 2 );++$i;?><div class="newfoods">
							<a href="__APP__/Foods/details/id/<?php echo ($nvo["id"]); ?>" class="thumbnail">
								<img src="__ROOT__/Uploads/Foods/thumb/th_<?php echo ($nvo["pic"]); ?>" style="width:120px;height:80px;">
							</a>
							<font style="font-size:14px;"><?php echo ($nvo["name"]); ?></font><br />
							<p style="font-size:12px;color:#909090">
								价格：<?php echo ($nvo["price"]); ?>￥
							</p>
							<font style="margin-left:5px;color:#909090;font-size:12px;">
								<b alt="<?php echo ($nvo["id"]); ?>" class="addCarts" id="inp28">
									<i class="icon-white icon-shopping-cart"></i>+购物车
								</b>
							</font>	
						</div><?php endforeach; endif; else: echo "" ;endif; ?>					
				</div>
			</div>


			<!-- 	<div style="height:50px;clear:left;margin-left:28px;"></div> -->
				<div class="clear_both"></div>
				<div style="float:right;background:white;border:#D9D9D9 1px solid;border-radius:5px;width:550px;">
				<div style="width:500px;height:30px;margin:15px 30px 0px;">
					<span style="color:#909090">最近流行</span>&nbsp;&nbsp;&nbsp;
					<!-- <a href=""><font style="color:#B24422;font-size:14px;">全部</font></a> -->
				</div>
				<div style="height:1px;background:#D9D9D9;margin:0px auto 15px;width:500px;"></div>
				<!-- 循环遍历结果 -->
				<div id="nav_cen">
					<?php if(is_array($foodsdata)): $i = 0; $__LIST__ = $foodsdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fovo): $mod = ($i % 2 );++$i;?><div style="width:150px;height:auto;overflow:hidden;float:left;margin-right:22px;margin-top:30px;">
							<a href="__APP__/Foods/details/id/<?php echo ($fovo["id"]); ?>" class="thumbnail"><img src="__ROOT__/Uploads/Foods/<?php echo ($fovo["pic"]); ?>" style="width:150px;height:100px;"></a><br>
							<font style="font-size:14px;color:#B24422"><?php echo ($fovo["name"]); ?></font><br>
							<font style="font-size:12px;color:#909090">
								价格：<?php echo ($fovo["price"]); ?>￥
							</font>
							<font style="margin-left:5px;color:#909090;font-size:12px;">
								<b alt="<?php echo ($fovo["id"]); ?>" class="addCarts" id="inp28">
									<i class="icon-white icon-shopping-cart"></i>+购物车
								</b>
							</font>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
					<div style="clear:both;height:20px;"></div>
				</div>
			</div>

				<div style="clear:both;height:20px;"></div>
					

				<!-- center bottom start -->
				<!-- <div style="width:650px;min-height:100px;">
					<div style="float:left;width:650px;height:100px;line-height:100px;color:#333333;font-size:18px;background:#DAD6D0;">
						<div style="margin-left:50px;">共有<span style="color:#EC6C3F;"><?php echo ($foodTotal); ?></span>道菜供您选择<span style="float:right;margin-top:6px;"><img src="__PUBLIC__/Home/Imgs/girl.jpg"></span>
						</div>
						
					</div> -->
					<!-- 循环遍历结果 -->
					
					<!-- <a href="">
					<div style="float:left;margin-top:5px;width:650px;height:100px;background:#E8E6E3">
						<div style="float:left;width:300px;height:100px;margin-left:20px;">
							<div style="margin-top:20px;color:#992222;height:20px;line-height:20px;">#烘烤蛋糕#</div>
							<div style="color:#909090;font-size:12px;height=25px;line-height:25px;">最幸福的瞬间莫过于，打开蛋糕盒，闻到蛋糕的香气...</div>
						</div>
						<div style="float:left;width:300px;height:100px;">
							<div style="float:right;margin-top:10px;"><img src="__PUBLIC__/Home/Imgs/cake.jpg"></div>
						</div>
					</div>
					</a>-->
				<!-- </div>  -->
				<!-- center bottom end -->
			</div>
			<!-- main left end -->


			<!-- main right start -->
			<div id="main_right">
		<!-- 		<div id="margin_right_top">
			<?php if(empty($_SESSION['uname'])): ?><form action="__APP__/Login/checkLogin/" method="post">
				<table width="250" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td colspan="2">
							<div id="name">
							<img id="nameimg" src="__PUBLIC__/Home/Imgs/20140106114606.jpg" style="float:left;"/><input type="text" id="loginuser" name="username" value="邮箱/用户名" onfocus="if (value =='邮箱/用户名'){value =''}" onblur="if (value ==''){value='邮箱/用户名'}"></div>
						</td>
					</tr>
					<tr height="14">
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2">
							<div id="pwd" style="width:250px;height:40px;line-height:40px;border:#DEDEDE 1px solid;">
							<img id="pwdimg" src="__PUBLIC__/Home/Imgs/20140106114642.jpg" style="float:left;"/>
							<input type="text" id="loginpwd" name="userpwd2" value="密码" style="width:212px;height:40px;float:left;border:none;outline:none;color:#666666">
							<input type="password" name="userpwd" id="login_password_index" style="width:212px;height:40px;float:left;border:none;display:none;outline:none;color:#666666"/>
							</div>
						</td>
					</tr>
					<tr height="45" valign="middle">
						<td><label><input type="checkbox" name="jizhu"/>下次自动登录</label></td>
						<td align="right"><a href="__APP__/Login/safe/">忘记密码?</a></td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="submit" value="登录" style="font-size:16px;color:white;border:none;background:#B24422;width:250px;height:40px;margin-top:10px;">
						</td>
					</tr>
				</table>
			</form>
			<?php else: ?>
				<table width="90%" style="margin:10px 5%">
					<tr>
						<td></td>
						<td>
							<a href="__APP__/Ucenter/index/header" >
							<img src="__ROOT__/Uploads/Users/thumb/th_<?php echo (session('uheadpic')); ?>" width="200" class="uheadpic"/>
							</a>
						</td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td align="left" style="text-indent:3em;">
						用户名:<?php echo (session('uname')); ?>
						</td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td align="left" style="text-indent:3em;">
						积&nbsp;分:<?php echo (session('umoney')); ?>
						</td>
						<td></td>
					</tr>
				</table><?php endif; ?>					
		</div> -->
				<!-- <div style="clear:both;height:30px;"></div> -->

	<!--			<div style="width:300px;height:250px;float:left;background:url(__PUBLIC__/Home/Imgs/20140122211754.jpg);"></div>-->
				
				<!-- <div style="clear:both;height:30px;"></div> -->

				<!-- 流行搜索开始 -->
				<div style="width:300px;height:220px;float:left;background:white;border:#D9D9D9 1px solid;border-radius:5px;">
					<div style="clear:both;height:20px;"></div>
					<font style="margin-left:20px;color:#A7A5A3;">点击排行</font><br>
					<div style="height:1px;background:#D9D9D9;margin:10px auto 0px;width:260px"></div>
					<?php if(is_array($logdata)): $i = 0; $__LIST__ = $logdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$logvo): $mod = ($i % 2 );++$i;?><div style="width:110px;float:left;margin-left:20px;margin-top:15px;font-size:14px;">
							<div style="width:10px;float:left;color:#909090">
								<font><?php echo ($i); ?></font>
							</div>
							<a href="__APP__/Foods/details/id/<?php echo ($logvo["fid"]); ?>">
								<font class="baicai">
									<?php echo ($logvo["name"]); ?>
								</font>
							</a>
							<span style="float:right;">
							<img src="__PUBLIC__/Home/Imgs/0.jpg" style="margin-left:5px;">
							</span>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<!-- 流行搜索结束 -->

				<!-- <div style="clear:both;height:30px;background:#F5F4F2;"></div> -->
				
				<!-- 用户排行开始 -->
				<div style="width:300px;height:630px;float:left;background:white;border:#D9D9D9 1px solid;margin-top:20px;border-radius:5px;">
					<div style="clear:both;height:20px;"></div>
					<font style="margin-left:20px;color:#A7A5A3;">用户排行</font>
					<!-- <a href=""><font style="margin-left:20px;color:#BD5E40;font-size:14px;">更多</font></a> -->
					
					<?php if(is_array($udata)): $i = 0; $__LIST__ = $udata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$uvo): $mod = ($i % 2 );++$i;?><div class="headpic">
							<br />
							<img src="__ROOT__/Uploads/Users/thumb/th_<?php echo ($uvo["headpic"]); ?>" style="width:60px;height:60px;" class="img-circle"/>
							<font style="float:left;margin-left:5px;color:#992222"><?php echo ($uvo["username"]); ?></font>
							<br>
							<font style="margin-left:5px;color:#B2A5BB;font-size:14px;">积分:<?php echo ($uvo["money"]); ?></font><br>
							<!-- <font style="margin-left:5px;color:#B2A5BB;font-size:14px;">12个作品</font> -->
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
					
				</div>
				<!-- <div style="width:300px;height:80px;text-align:center;line-height:80px;">
					<a href="">
						<font style="float:left;margin-left:120px;color:#992222;font-size:14px;">查看更多</font>
					</a>
				</div> -->
				<!-- 用户排行结束 -->
			</div>
			<!-- main right end  -->
		</div>

		<!-- Modal -->
		<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 			<div class="modal-header">
    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    		<h3 id="myModalLabel">请登陆</h3>
  		</div>
  		<div class="modal-body">
  			 <form class="form-horizontal" action="__APP__/Login/checkLogin/" method="post">
  			  <div class="control-group">
  			    <label class="control-label" for="inputEmail">用户名：</label>
  			    <div class="controls">
  			      <input type="text" id="inputEmail" placeholder="输入用户名" name="username">
  			    </div>
  			  </div>
  			  <div class="control-group">
  			    <label class="control-label" for="inputPassword">密&nbsp;&nbsp;&nbsp;&nbsp;码：</label>
  			    <div class="controls">
  			      <input type="password" id="inputPassword" placeholder="输入密码" name="userpwd">
  			    </div>
  			  </div>
  			  <div class="control-group">
  			    <div class="controls">
  			      <label class="checkbox">
  			        <input type="checkbox" name="jizhu"> 记住我
  			        <a href="__APP__/Login/safe/" style="margin-left:80px;text-decoration:none;color:#992222;font-size:13px;">忘记密码?</a>
  			      </label>

  			      <button type="submit" class="btn">登陆</button>
  			    </div>
  			  </div>
  			</form>
  		</div>
  		<div class="modal-footer">
   	 		<button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
  		</div>
		</div> 

	</body>
</html>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>DCMS</title>
	<link href="__PUBLIC__/Home/Css/footer.css" rel="stylesheet" type="text/css" />	
</head>
<body>
	<div id="footer">
			<span class="footer_left">
				<a href="__APP__/Us/us/">关于我们</a>
				<a href="__APP__/Help/help/">帮助中心</a>
				<a href="__APP__/Us/contact2Us/">联系我们</a>
			</span><br>
			<span class="footer_left">
				Copyright&copy;<?php echo ($webData["email"]); ?> <?php echo ($webData["contact"]); ?>
				<?php echo ($webData["icpno"]); ?>
			</span>
			
			<?php if(is_array($linkData)): $i = 0; $__LIST__ = $linkData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$linkVo): $mod = ($i % 2 );++$i;?><span class="footer_left" style="margin-left:10px;">
					<a href="http://<?php echo ($linkVo["url"]); ?>" target="<?php echo ($linkVo["target"]); ?>"><?php echo ($linkVo["title"]); ?></a>
				</span><?php endforeach; endif; else: echo "" ;endif; ?>

<!-- 			<span class="footer_right" style="margin-left:5px;">
	唯有车辆与爱不可辜负
</span> -->
	</div>
</body>
</html>