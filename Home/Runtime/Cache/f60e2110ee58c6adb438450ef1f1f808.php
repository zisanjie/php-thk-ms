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
	<title>reg index</title>
	<link href="__PUBLIC__/Home/Css/reg.css" rel="stylesheet" type="text/css" />
	<script src="__PUBLIC__/Js/jquery-1.8.3.js"></script>
	
	<script type="text/javascript">
		$(function(){
			$('#regSubmit').submit(function(){
				var email = $('#regSubmit .email').val();
				var userpwd = $('#regSubmit .userpwd').val();
				var ruserpwd = $('#regSubmit .ruserpwd').val();
				var username = $('#regSubmit .username').val();
				var truename = $('#regSubmit .truename').val();
				var address = $('#regSubmit .address').val();
				var phone = $('#regSubmit .phone').val();

				if('' == email || ('' != email && !/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/.test(email))){
					alert('邮箱不正确!');
					return false;
				}

				if('' == userpwd || userpwd != ruserpwd || ('' != userpwd && !/^[a-z0-9_-]{6,18}$/.test(userpwd))){
					alert('密码不正确!');
					return false;
				}

				if('' == username || ('' != username && !/^[a-zA-Z0-9_-]{3,16}$/.test(username))){
					alert('昵称不正确!请输入数字和字母的组合');
					return false;
				}
				if('' == truename || ('' != truename && /^[a-zA-Z0-9_-]{0,16}$/.test(truename))){
					alert('姓名不正确!请输入汉字');
					return false;
				}
				if('' == address){
					alert('地址不为空!');
					return false;
				}
				if('' == phone || ('' != phone && !/^1[0-9]{10}$/.test(phone))){
					alert('手机号1开头共11位!');
					return false;
				}			
			});

			$('#regSubmit .email').blur(function(){
				var email = $('#regSubmit .email').val();
				$(this).parent().next().children().remove();

				if('' == email || ('' != email && !/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/.test(email))){
					
					$(this).parent().next().append('<font color="red">邮箱不正确</font>');
					return false;
				}
				
				var $parent = $(this).parent().next();
				$.post('__APP__/Login/yzemail/',{email:email},function(jdata){

					 	// var data = eval("("+jdata+")");//AJAX返回传来的值是JSON形式的数据，用eval转码
					 	var data = jdata;
					 	var exist = '';

					 	if(data.data=="exist"){
						     exist = '<font color="red">该邮箱已被注册.</font>';
						     	
						}else{
							exist = '<font color="green">该邮箱可用.</font>';
						}

						$parent.append(exist);
				});  

			});

			$('#regSubmit .userpwd').blur(function(){
				var userpwd = $('#regSubmit .userpwd').val();
				$(this).parent().next().children().remove();

				if('' == userpwd || ('' != userpwd && !/^[a-z0-9_-]{6,18}$/.test(userpwd))){
					
					$(this).parent().next().append('<font color="red">密码6-18位</font>');
				}else{
					$(this).parent().next().append('<font color="green">密码格式正确</font>');
				}
			});

			$('#regSubmit .ruserpwd').blur(function(){
				var userpwd = $('#regSubmit .userpwd').val();
				var ruserpwd = $('#regSubmit .ruserpwd').val();
				$(this).parent().next().children().remove();

				if('' == userpwd || userpwd != ruserpwd || ('' != userpwd && !/^[a-z0-9_-]{6,18}$/.test(userpwd))){
					
					$(this).parent().next().append('<font color="red">两次密码不一致</font>');
				}else{
					$(this).parent().next().append('<font color="green">密码输入正确</font>');
				}
			});

			$('#regSubmit .username').blur(function(){
				var username = $('#regSubmit .username').val();
				$(this).parent().next().children().remove();

				if('' == username || ('' != username && !/^[a-zA-Z0-9_-]{3,16}$/.test(username))){
					
					$(this).parent().next().append('<font color="red">昵称为数字,字母组合</font>');
					return false;
				}

				var $parent = $(this).parent().next();
				//AJAX连接数据库判断用户是否存在				
				 $.post('__APP__/Login/yzuser/',{username:username},function(data){
				 	// var data = eval("("+jdata+")");//AJAX返回传来的值是JSON形式的数据，用eval转码
				 	
				 	var exist;

				 	if(data.data=="exist"){
					     exist = '<font color="red">该昵称已存在.</font>';
					}else{
					     exist = '<font color="green">该昵称可用.</font>';
					}

					$parent.append(exist);
				});
			});	
			$('#regSubmit .truename').blur(function(){
				var truename = $('#regSubmit .truename').val();
				$(this).parent().next().children().remove();

				if('' == truename || ('' != truename && /^[a-zA-Z0-9_-]{0,16}$/.test(truename))){
					
					$(this).parent().next().append('<font color="red">姓名为汉字</font>');
					return false;
				}else{
					$(this).parent().next().append('<font color="green">姓名正确.</font>');
				}
				});	

				$('#regSubmit .address').blur(function(){
				var address = $('#regSubmit .address').val();
				$(this).parent().next().children().remove();

				if('' == address){
					
					$(this).parent().next().append('<font color="red">地址不正确</font>');
					return false;
				}else{
					$(this).parent().next().append('<font color="green">地址正确</font>');
				}
				});	

				$('#regSubmit .phone').blur(function(){
				var phone = $('#regSubmit .phone').val();
				$(this).parent().next().children().remove();

				if('' == phone || ('' != phone && !/^1[0-9]{10}$/.test(phone))){
					
					$(this).parent().next().append('<font color="red">手机号1开头共11位</font>');
					return false;
				}else{
					$(this).parent().next().append('<font color="green">手机号正确</font>');
				}
				});		
		});
	</script>
</head>
<body>
	<div id="reg_wrap">
		<h2>注册一个新的帐号</h2>
		<div id="reg_content">
			<form action="__APP__/Login/checkReg/" method="post" id="regSubmit">
				<table  cellpadding="0" cellspacing="0" border="0" style="margin-left:150px;">
					<tr>
						<td width="100" align="center">邮　　箱
						<font color="red">*</font>
						</td>
						<td width="200">
						<input type="text" name="email" class="email input500"></td>
						<td style="text-indent:1em;"></td>
					</tr>
					<tr>
						<td align="center">
						密　　码
						<font color="red">*</font>
						</td>
						<td><input type="password" name="userpwd" class="userpwd input500"></td>
						<td style="text-indent:1em;"></td>
					</tr>
					<tr>
						<td align="center">
						确认密码
						<font color="red">*</font>
						</td>
						<td><input type="password" name="ruserpwd" class="ruserpwd input500"></td>
						<td style="text-indent:1em;"></td>
					</tr>
					<tr>
						<td align="center">
						昵　　称
						<font color="red">*</font>
						</td>
						<td><input type="text" name="username" class="username input500"></td>
						<td style="text-indent:1em;">
							
						</td>
					</tr>
					<tr>
						<td align="center">
						真实姓名
						<font color="red">*</font>
						</td>
						<td><input type="text" name="truename" class="truename input500"></td>
						<td style="text-indent:1em;">
							
						</td>
					</tr>
					<tr>
						<td align="center">
						地　　址
						<font color="red">*</font>
						</td>
						<td><input type="text" name="address" class="address input500"></td>
						<td style="text-indent:1em;">
							
						</td>
					</tr>
					<tr>
						<td align="center">
						手　　机
						<font color="red">*</font>
						</td>
						<td><input type="text" name="phone" class="phone input500"></td>
						<td style="text-indent:1em;">
							
						</td>
					</tr>
					<tr>
						<td align="center">
						验证码
						</td>
						<td><input type="text" name="verify" class=" input500" style="width:100px;"><img src='__APP__/Login/verify/' onClick="changeImg(this)"/></td>
						<td style="text-indent:1em;">
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>
							<button type="submit" class="butAdd" style="margin-top:-110px;margin-left:420px;">
							注册
							</button>
						</td>
					</tr>
				</table>
			</form>	
		</div>		
	</div>
</body>
</html>
<script>
			function changeImg(obj){
				obj.src = '__APP__/Login/verify/'+Math.random();
			}

		</script>

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