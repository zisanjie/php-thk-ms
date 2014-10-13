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
	<title>用户中心</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/Css/ucenter_index.css">
	<script type="text/javascript" src="__PUBLIC__/Js/jquery-1.8.3.js"></script>

</head>

<script type="text/javascript">
		$(function(){
			//获取当前url
			var url = window.location.pathname;
					
			$('#main_right .oper div').hide();
			$('#main_right .oper div :input').not($(':submit,:reset,:button')).addClass('inp24');
			// $('#main_right .oper div :submit').addClass('but25'); //为提交按钮统一添加样式

			$('#main_right .oper div td:even').attr({'height':'30px'});

			if(url.search(/pass/i)>-1){

				var $oper = $('#main_right .oper .pass');
				$oper.show();	
				$("#index_main .left_down .mpass").css({'color':'black'});
				$('#navInfo').text('个人资料信息');	
			}else if(url.search(/address/i)>-1){

				var $oper = $('#main_right .oper .address');
				$oper.show();
				$("#index_main .left_down .maddress").css({'color':'black'});
				$('#navInfo').text('订车地址信息');	
			}else if(url.search(/histroy/i)>-1){

				var $oper = $('#main_right .oper .histroy');
				$oper.show();
				$("#index_main .left_down .mhistroy").css({'color':'black'});
				$('#navInfo').text('查看订车历史');	
			}else if(url.search(/money/i)>-1){

				var $oper = $('#main_right .oper .money');
				$oper.show();
				$("#index_main .left_down .mmoney").css({'color':'black'});
				$('#navInfo').text('修改用户密码');	
			}else if(url.search(/header/i)>-1){

				var $oper = $('#main_right .oper .header');
				$oper.show();
				$("#index_main .left_down .mheader").css({'color':'black'});
				$('#navInfo').text('修改用户头像');	
			}else{

			}



			var maxLength = 108;
			//限制输入框中字的长度，未完成
			$("#address").keydown(function(){
				var curLength = $("#address").val().length;	
				if(curLength>=maxLength){
					var num=$("#address").val().substr(0,maxLength-1);
					$("#address").val(num);
				} 
			});			

		});
</script>
<script type="text/javascript">
		$(function(){
			$('#regSubmit').submit(function(){
				
				var userpwd = $('#regSubmit .userpwd').val();
				var ruserpwd = $('#regSubmit .ruserpwd').val();

				if('' == userpwd || userpwd != ruserpwd || ('' != userpwd && !/^[a-z0-9_-]{6,18}$/.test(userpwd))){
					alert('密码格式不正确!');
					return false;
				}			
			});


			$('#regSubmit .userpwd').blur(function(){
				var userpwd = $('#regSubmit .userpwd').val();
				$(this).parent().next().children().remove();

				if('' == userpwd || ('' != userpwd && !/^[a-z0-9_-]{6,18}$/.test(userpwd))){
					
					$(this).parent().next().append('<font color="red">密码格式不正确</font>');
				}else{
					$(this).parent().next().append('<font color="green">格式输入正确</font>');
				}
			});

			$('#regSubmit .ruserpwd').blur(function(){
				var userpwd = $('#regSubmit .userpwd').val();
				var ruserpwd = $('#regSubmit .ruserpwd').val();
				$(this).parent().next().children().remove();

				if('' == userpwd || userpwd != ruserpwd || ('' != userpwd && !/^[a-z0-9_-]{6,18}$/.test(userpwd))){
					
					$(this).parent().next().append('<font color="red">两次密码不一致</font>');
				}else{
					$(this).parent().next().append('<font color="green">输入正确</font>');
				}
			});

			var href = $('#page a');

			for(var i=0; i<href.length;i++){
				
				$(href[i]).attr({href:$(href[i]).attr('href')+'/histroy'});
			}
		});
</script>
<body>
	<div id="index_main">
		<div class="main_left">
			<div class="left_top">
				<img src="__ROOT__/Uploads/Users/thumb/th_<?php echo (session('uheadpic')); ?>" style="width:200px; height:200px">
			</div>
			<div class="left_down">
				<ul>
					<a href="__URL__/index/pass" class="mpass"><li>个人资料</li></a>
					<a href="__URL__/index/address" class="maddress"><li>接车地址</li></a>
					<a href="__URL__/index/histroy" class="mhistroy"><li>订单历史</li></a>
					<a href="__URL__/index/money" class="mmoney"><li>修改密码</li></a>
					<a href="__URL__/index/header" class="mheader"><li>修改头像</li></a>
				</ul>
			</div>
		</div>
		<div id="main_right" class="main_right">
			<div class="nav">
		                    <img class="nav_o" src="__PUBLIC__/Home/Imgs/orders_actions_icon.gif">
		                    <span id="navInfo">个人资料</span>
		            </div>
			<div class="oper">
				<form action="__APP__/Ucenter/update" method="post" id="upSubmit">
					<div class="pass">
						<p>
							<label>当前头像：</label>
							<span>
								<img src="__ROOT__/Uploads/Users/thumb/th_<?php echo (session('uheadpic')); ?>" style="width:85px;height:85px">
							</span>
						</p>
						<p>
							<label>
							昵&nbsp;&nbsp;&nbsp;&nbsp;称：<b style="color:#992222;margin-left:10px;">
								<?php echo (session('uname')); ?>
							</b></label>	
						</p>
						<p>
							<label>
							积&nbsp;&nbsp;&nbsp;&nbsp;分：<b style="color:#992222;margin-left:10px;">
								<?php echo (session('umoney')); ?>
							</b></label>	
						</p>
						<p>
							<label>
							姓&nbsp;&nbsp;&nbsp;&nbsp;名：
							<input style="margin-left:10px;" type="text" name="truename" value="<?php echo (session('utruename')); ?>" class="input500" />
							</label>	
						</p>
						<p>
							<label>电&nbsp;&nbsp;&nbsp;&nbsp;话：
							<input style="margin-left:10px;" type="text" name="phone" value="<?php echo (session('uphone')); ?>" class="phone" />
							</label>
						</p>
						<p style="height:50px;">
							<input type="hidden" name="id" value="<?php echo (session('uid')); ?>" />
							<button class="butAdd" style="margin-top:20px;margin-left:100px;" type="submit">保存</button>
						</p>
					</div>
				</form>
				<form action="__APP__/Ucenter/upaddress" method="post">
					<div class="address">
						<p>
							<label>收货人姓名：
							<input class="input500" style="margin-left:11px;" type="text" name="truename" value="<?php echo (session('utruename')); ?>" readonly>
							</label>
						</p>
						<p>
							<label>收货人地址：
							<input class="input500" style="margin-left:11px;" type="text" name="address" value="<?php echo (session('uaddress')); ?>">
							</label>	
						</p>
						
						<p style="height:50px;">
							<input type="hidden" name="id" value="<?php echo (session('uid')); ?>" />
							<button class="butAdd" style="margin-top:20px;margin-left:100px;" type="submit">保存</button>
						</p>
					</div>
				</form>
					<div class="histroy">
						<!-- <center><h4>历史订单</h4></center> -->
				                <table width="100%" cellspacing="0" cellpadding="0" align="center">
				                        <tr>
				                            <th style="text-align:left;text-indent:3em;">订单号</th>
				                            <th>电话号码</th>
				                            <th>接车地址</th> 
				                            <th>订车时间</th>
				                            <th>订车状态</th>
				                            <th>订单详情</th>
				                        </tr>				                    
				                        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				                                <td style="text-align:left;">
				                                <?php echo ($vo["form_number"]); ?></td>
				                                <td><?php echo ($vo["phone"]); ?></td> 
				                                <td><?php echo ($vo["address"]); ?></td>  
				                                <td>
				                                		<?php echo (date("Y-m-d H:i:s",$vo["ftime"])); ?>
				                                </td>
				                                <td>
				                                		<?php if($vo["status"] == 3): ?>已过期                     		
								<?php elseif($vo["status"] == 2 ): ?>已完成
								<?php else: ?>进行中<?php endif; ?>
				                                </td>		            
				                                <td>
				                                    <a href="__APP__/Posts/details/form_number/<?php echo ($vo["form_number"]); ?>" target="__blank">查看</a>
				                                </td>
				                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
				                        <tr>
				                        	<td colspan="6" id="page">
				                        		共<?php echo ($page); ?>
				                        	</td>
				                        </tr>   
                				   </table>
					</div>					
					<div class="money">
						<form action="__APP__/Ucenter/alterpwd/" method="post" id="regSubmit">
						<table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top:50px;">
							<tr>
								<td width="80" align="center">邮　　箱</td>
								<td width="350">
									<input type="text" name="email" class="email input500" value="<?php echo (session('uemail')); ?>" readonly />
								</td>
								<td></td>
							</tr>
							<tr>
								<td align="center">密　　码</td>
								<td>
									<input type="password" name="userpwd" class="userpwd input500" />
								</td>
								<td></td>
							</tr>
							<tr>
								<td align="center">确认密码</td>
								<td>
									<input type="password" name="ruserpwd" class="ruserpwd input500" />
								</td>
								<td></td>
							</tr>
							<tr>
								<td colspan="3">
									<input type="hidden" name="id" value="<?php echo (session('uid')); ?>">
									<button class="butAdd" style="margin-top:20px;margin-left:100px;" type="submit">修改</button>
								</td>
							</tr>
						</table>
					</form>	
				</div>
				<div class="header">
				<form action="__APP__/Ucenter/headpic" method="post" enctype="multipart/form-data">
					<p style="margin-top:50px;">
						
						<span>
							<img src="__ROOT__/Uploads/Users/thumb/th_<?php echo (session('uheadpic')); ?>" width="200" height="200">
						</span>
					</p>
					<p>  	
						<label>修改图像：
						<input type="file" name="headpic" style="border:0px;"/>
						<input type="hidden" name="lastheadpic" value="th_<?php echo (session('uheadpic')); ?>">
						<input type="hidden" name="id" value="<?php echo (session('uid')); ?>" />
						</label>
					</p>
					<p>
						<button class="butAdd" style="margin-top:20px;margin-left:100px;" type="submit">修改</button>
					</p>
				</form>

					
				</div>
			</div>
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