<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
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
				<span>
					<a href="__APP__/Ucenter/index/pass">
					个人中心
					</a>
				</span>
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
<head>
	<meta charset="UTF-8">
	<title>添加用户订单</title>
	<link href="__PUBLIC__/Home/Css/addPosts.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="addPosts" class="wrap">
		<div class="left FL">
			<div class="nav">
				<img class="nav_o" src="__PUBLIC__/Home/Imgs/orders_actions_icon.gif">
				<span>完成订单</span>
				<span style="float:right;">
					成交价:<?php echo (session('total')); ?>元
				</span>
			</div>
			<div class="posts_wrap">
				<form action="__APP__/Posts/finform" method="post" id="setForms">
			  	<table width="620" border="0" cellpadding="0" cellspacing="0"><tr>
				      		<td align="right" height="33">订单号</td>
				      		<td width="309">　<?php echo (session('form_number')); ?></td>
				      		<td width="237" class="font_explain">&nbsp;</td>
			       	 	</tr>
				    	<tr>
				      		<td align="right" height="33">姓名</td>
				      		<td width="309">　<?php echo (session('utruename')); ?></td>
				      		<td width="237" class="font_explain">&nbsp;</td>
			       	 	</tr>
				    	<tr>
				    	  <td align="right" height="39">手机号</td>
				    	  <td width="309">　<?php echo (session('uphone')); ?></td>
				    	  <td width="237" class="font_explain">&nbsp;</td>
                  				</tr>
			    		<tr>
			      			<td align="right" height="30"><label for="address">详细地址</label></td>
			      			<td>　<?php echo (session('uaddress')); ?></td>
			      			<td class="font_explain">&nbsp;</td>
		        			</tr>
			    		<tr>
			      			<td align="right" height="47"><label for="userohters">餐饮要求</label></td>
			      			<td>　
							<?php if(empty($_SESSION['ask'])): ?>无
							<?php else: echo (session('ask')); endif; ?>
			      			</td>
			      			<td class="font_explain">&nbsp;</td>
		        			</tr>
					<tr>
				      		<td colspan="3" align="right" height="100">
		                  				<input class="inp22" type="submit" value="完成订单" />
	                  		　　		</td>
		        			</tr>
		      		</table>
				</form>	
			</div>
		</div>
		<div class="right FL">
			<table border='0'>
				<caption><b>车辆详情</b></caption>
				<tr>
					<th>名称</th>
					<th>价格</th>
					<th>数量</th>
					<th>总计</th>
				</tr>　　　　　　　　　　　　　				
				<?php if(is_array($_SESSION['forms'])): $i = 0; $__LIST__ = $_SESSION['forms'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
						<td><?php echo ($vo["name"]); ?></td>
						<td><?php echo ($vo["price"]); ?>元</td>
						<td>x<?php echo ($vo["number"]); ?></td>
						<td>
							<?php echo ($vo['price']*$vo['number']); ?>
							<?php $total+=$vo['price']*$vo['number']?>元
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?> 
			</table>
			<span class="total">总计：
			<?php echo (session('total')); ?>元　</span>
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

			<span class="footer_right" style="margin-left:5px;">
				唯有车辆与爱不可辜负
			</span>
	</div>
</body>
</html>