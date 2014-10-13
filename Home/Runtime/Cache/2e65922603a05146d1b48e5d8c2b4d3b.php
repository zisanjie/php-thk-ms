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
	<head>
		<meta charset="UTF-8">
		<title>details</title>
		<link href="__PUBLIC__/Home/Css/foods_detail.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="__PUBLIC__/Js/jquery-1.8.3.js"></script>
		<link rel="stylesheet" href="__PUBLIC__/Admin/tpl/css/bootstrap.min.css" type="text/css" />
		<!-- Include all compiled plugins (below), or include individual files as needed --> 
		<script src="__PUBLIC__/Admin/tpl/js/bootstrap.min.js"></script>
		
		<script type="text/javascript">
		 	$(function(){
		 	/*添加到购物车Ajax*/
			$('#addCarts').click(function(){
				
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
	                                        		//window.location.href = "__APP__/Login/login";
	                                        		$('#myModal').modal('show');
	                                        	}
				});
			});

			/*删除评论*/
			$('.delEva').click(function(){
				
				var eid = $(this).attr('alt');				
				var url = '__APP__/Foods/delEva/';
				var nowobj = $(this);

				$.post(url,{id:eid},function(cdata){

					if('YES' == cdata.data){
	                                                	
	                                            		nowobj.parent().parent().remove();
	                                        	}else{
	                                        		alert('删除评论失败!');
	                                        	}
				});
			});

			
			$('#addEva').submit(function(){
				var content = $(".evaContent").val();
				if(!content){
					alert('请输入评价内容!');	
					return false;
				}
			});

		 });

		</script>
	</head>
	<body>
		<div id="detail" style="background:white;border:#D9D9D9 1px solid;border-radius:5px;">
			<div id="detail_left">
				<img src="__ROOT__/Uploads/Foods/<?php echo ($data["pic"]); ?>" width="650" style="max-height:420px;border-radius:5px;">
				<div style="width:650px;float:left;">
					<a href="__APP__/Carts/showCarts/" target="_blank">
						<div class="car">查看购物车</div>
					</a>
					<a alt="<?php echo ($data["id"]); ?>" id="addCarts" class="car">
						<div>加入购物车</div>
					</a>
				</div>
				
				<div style="width:650px;float:left;color:#8B8B8B;">
					<span style="margin-left:10px;">
						好评度:<font style="color:#9C2222;font-size:14px;">
							<?php if(empty($edata)): ?>暂无评价
							<?php else: ?> <?php echo ($edata); endif; ?>
						</font>
					</span>
					<span style="margin-left:20px;">
						预定量:<font style="color:#9C2222;font-size:14px;"><?php echo ($f_num); ?>
							<?php if(empty($f_num)): ?>0
							<?php else: ?> <?php echo ($f_num); endif; ?>
						</font>
					</span>
				</div>
				<div style="clear:both;height:20px;"></div>
			</div>

			<div id="detail_right">

				<div id="right_top">
					<p class="pstyle">名称：
						<font style="font-size:14px;"><?php echo ($data["name"]); ?></font> 
					</p>
					<p class="pstyle">价格：
						<font style="font-size:14px;">
							<?php echo ($data["price"]); ?>￥
						<font>
					</p>
					<p class="pstyle">状态：
						<font style="font-size:14px;">
						<?php if($data["status"] == 1 ): ?>在售
						<?php else: ?> 已下架<?php endif; ?>
						</font>
					</p>
					<span style="margin-left:10px;color:#68616D;">描述：</span>
					<font style="font-size:14px;text-indent:3em;color:#68616D;">
						<div style="margin:0px 10px;">
							<?php echo (substr($data["describe"],0,1000)); ?>
						</div>
					</font>
				</div>
			</div>
			<div style="clear:both;height:30px;background:white;border-top:#cdcdcd 1px solid;"></div>
			<div style="width:980px;background:#FEFEFE;float:left;">
					<div>
						<span style="margin-left:10px;color:#d2beac;font-size:14px;margin-bottom:0px;">
							用户评价
						</span>
					</div>
					<div style="width:470px;float:left;margin-left:10px;border:#D9D9D9 1px solid;border-radius:5px;">
					<?php if(is_array($ed)): $i = 0; $__LIST__ = $ed;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$edvo): $mod = ($i % 2 );++$i; if($i%2 != 0 ): ?><div class="flag">
						<div class="colorGreen"></div>
						<div class="-E">
							<p>
								<span style="color:#9C2222;">
								用户:	<?php echo ($edvo["username"]); ?>
								</span>
							</p>
							<p>
								<span style="margin-left:20px;font-size:14px;text-indent:2em;">
								内容:	<?php echo ($edvo["content"]); ?>
								</span>
							</p>
							<p>
								<span style="margin-left:20px;color:#d2beac;">
								<?php echo ($edvo["posttime"]); ?>
								</span>
							</p>
						</div>
						<div class="evaRight">
							<?php if($_SESSION['uid']== $edvo['uid']): ?><img src="__PUBLIC__/Imgs/error.png" alt="<?php echo ($edvo["id"]); ?>" title="删除" width="15" class="delEva"><?php endif; ?>
						</div>
						</div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
					</div>

					<div style="width:470px;float:right;margin-right:10px;">
					<?php if(is_array($ed)): $i = 0; $__LIST__ = $ed;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$edvo): $mod = ($i % 2 );++$i; if($i%2 == 0 ): ?><div class="flag">
						<div class="colorBlue"></div>
						<div class="-E">
							<p>
								<span style="color:#9C2222;">
								用户:	<?php echo ($edvo["username"]); ?>
								</span>
							</p>
							<p>
								<span style="margin-left:20px;font-size:14px;text-indent:2em;">
								内容:	<?php echo ($edvo["content"]); ?>
								</span>
								</p>
							<p>
								<span style="margin-left:20px;color:#d2beac;">
								<?php echo ($edvo["posttime"]); ?>
								</span>
							</p>
						</div>
						<div class="evaRight">
							<?php if($_SESSION['uid']== $edvo['uid']): ?><img src="__PUBLIC__/Imgs/error.png" alt="<?php echo ($edvo["id"]); ?>" title="删除" width="15" class="delEva"><?php endif; ?>
						</div>
						</div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>
				<div style="height:30px;background:white;clear:both;"></div>
				<div style="width:650px;min-height:100px;float:left;">
					<form action="__APP__/Foods/evaluate" method="post" id="addEva">
						<input type="hidden" name="fid" value="<?php echo ($footsid); ?>">
						<!-- <font style="margin-left:10px;">评论内容</font> -->						
						<textarea name="content" class="evaContent" style="width:630px;height:100px;margin-left:10px; resize:none;margin-top:0px;"></textarea>
						<input type="submit" value="评论" style="border:none;width:120px;height:30px;background:#9C2222;margin-left:10px;margin-top:10px;margin-bottom:10px;color:white;font-size:16px;">
					</form>
				</div>
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