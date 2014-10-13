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
	<title>购物车</title>
	<link rel="stylesheet" href="__PUBLIC__/Home/Css/carts.css">
          <script type="text/javascript" src="__PUBLIC__/Js/jquery-1.8.3.js"></script>
</head>
            <script>
                    $(function(){
                        setPrice();     //设置价格

                        $("#carts .carts_center .tr_hui").mouseover(function(){
                            $(this).css({background:'#f2f2f2'});
                        });
                        $("#carts .carts_center .tr_hui").mouseout(function(){
                            $(this).css({background:'white'});
                        })

                        //回首页
                        $('#toIndex').click(function(){
                            
                            window.location.href="__APP__/Index/index/";
                        });

                        $('.in').click(function(){
                             setPrice();     //设置价格
                        });

                        $('.all').click(function(){
                                
                                var obj = document.getElementsByName('input[]');
                                //兼容写法
                                var n=obj.length;

                                for(var i=0;i<n;i++){
                                    if(obj[i].checked){
                                        obj[i].checked=false;
                                    }else{
                                        obj[i].checked=true;
                                    }
                                }

                                setPrice();     //设置价格
                        });

                        $('.delCarts').click(function(){

                                if(!confirm('你确定要删除吗?')){
                                    return false;
                                }

                                var $th = $(this);
                                // var id = $(this).parent().siblings().children('.in').val();
                                var id = $(this).attr('alt');                               
                                var url = '__APP__/Carts/delCarts/';

                                id = parseInt(id);
                                
                                $.post(url,{id:id},function(data){
                                        
                                        if('YES' == data.data){
                                                $th.parent().parent().remove();
                                                setPrice();     //设置价格
                                        }else{
                                            alert('删除失败!');
                                        }
                                });
                        });

                        $('.delSome').click(function(){
                             if(!confirm('你确定要删除吗?')){
                                    return false;
                            }
                            
                             var checked = $('.in:checked');
                             var n=checked.length;

                             for(var i=0; i<n; i++){
                                    var url = '__APP__/Carts/delCarts/';                                    
                                    $.post(url,{id:$(checked[i]).siblings('input:hidden').val()},function(data){
                                                
                                            if('YES' == data.data){
                                                       $('.in:checked').parent().parent().remove();
                                                       setPrice();     //设置价格
                                            }
                                    });
                             }

                             
                        });

                        $('.input_text').blur(function(){
                            $pat  = /^[1-9]\d*|0$/;
                            if(!$pat.test($(this).val())){
                                alert('这不是一个合法的值');
                                $(this).val(1);
                            }
                            
                            var yp = $(this).attr('id');                            
                            var ypr = $('.'+yp).text();                          
                            // setPrice();     //设置价格
                            $(this).parent().siblings('.oneTatal').text($(this).val()*ypr);
                            setPrice();
                        });

                        $('#addForms').submit(function(){
                                var checked = $('.in:checked');
                                var n=checked.length;
                                if(n<1){
                                    alert('您还没有选择车辆！');
                                    return false;
                                }
                        });

                        /* 计算支付总额 */
                        function setPrice(){
                            var obj = $('.in:checked');
                            var id;
                            var price = 0;
                            var number = 0;
                            var sum = 0;
                            var total = 0;

                            for(var i=0; i<obj.length; i++){
                                    id = $(obj[i]).val();
                                    price = parseInt($('.'+id).text());                                    
                                    number = parseInt($('#'+id).val());
                                    total = price*number;
                                    $(obj[i]).parent().siblings('.oneTatal').text(total);
                                    //设置单类车辆总计
                                    sum += total;
                            }

                            $('#sumMoney').text(sum+'元');
                        }
                                  
                    });
            </script>
<body>
	<div id="carts" style="background:white;border:#D9D9D9 1px solid;border-radius:5px;">
		<div class="carts_top" style="border:#D9D9D9 1px solid;">　我的购物车</div>
		<div class="carts_center">
                                <form action="__APP__/Posts/addPosts/" method="post" id="addForms">
                                 <table width="940" border="0" cellspacing="0" cellpadding="0" align="center">
                                          <tr class="carts_center_th">
                                            <th width="25"><input type="checkbox" class="all"></th>
                                            <th width="44">反选</th>
                                            <th colspan="2">车辆名称</th>
                                            <th colspan="2">原价（元）</th>
                                            <th colspan="2">优惠价（元）</th>
                                            <th colspan="2">数量</th>
                                            <th colspan="2">小计(元)</th>
                                            <th colspan="2">操作</th>
                                          </tr>
                                          <?php if(is_array($_SESSION['carts'])): $i = 0; $__LIST__ = $_SESSION['carts'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="tr_hui">
                                                <td height="46"></td>
                                                <td>
                                                    <input type="checkbox" class="in" name="input[]" value="<?php echo ($vo["fid"]); ?>">
                                                    <input type="hidden" value="<?php echo ($vo["id"]); ?>">
                                                </td>
                                                <td width="40">&nbsp;</td>
                                                <td class="carts_center_left" width="145">
                                                    <?php echo ($vo["name"]); ?>
                                                </td>
                                                <td width="65">&nbsp;</td>
                                                <td class="carts_center_left" width="91">
                                                    <?php echo ($vo["price"]); ?>
                                                </td>
                                                <td width="62">&nbsp;</td>
                                                <td class="carts_center_left" width="87" >
                                                    <font class="<?php echo ($vo["fid"]); ?>">
                                                        <?php if(($vo['yprice'] == $vo['price']) or ($vo['yprice'] == '')): echo ($vo['price']); ?>
                                                        <?php else: ?>
                                                            <?php echo ($vo['yprice']); endif; ?>
                                                    </font>
                                                </td>
                                                <td width="30">&nbsp;</td>
                                                <td class="carts_center_left" width="82">
                                                    <input class="input_text" id="<?php echo ($vo["fid"]); ?>" type="text" name="number[<?php echo ($vo['fid']); ?>]"  value="<?php echo ($vo['number']); ?>">
                                                </td>
                                                <td width="52">&nbsp;</td>
                                                <td class="carts_center_left carts_red oneTatal" width="81"><?php echo ($vo['total']); ?></td>
                                                <td width="35">&nbsp;</td>
                                                <td class="carts_center_left" width="66">
                                                    <a class="delCarts" alt="<?php echo ($vo["id"]); ?>">删除</a>
                                                </td>
                                              </tr><?php endforeach; endif; else: echo "" ;endif; ?>                                         

                                          <tr class="carts_center_th carts_two">
                                            <th height="50" width="25"><input type="checkbox" class="all"></th>
                                            <th width="44">选择</th>
                                            <th colspan="2" align="left"><a class="delSome">批量删除</a></th>
                                            <th colspan="2">&nbsp;</th>
                                            <th colspan="2">&nbsp;</th>
                                            <td class="carts_total" colspan="3">您共需支付：</td>
                                            <td class="carts_tv carts_red" colspan="3" id="sumMoney">
                                                
                                            </td>
                                          </tr>
                                          <tr class="carts_center_th carts_two">
                                            <td height="50" width="25">&nbsp;</td>
                                            <td width="44">&nbsp;</td>
                                            <td colspan="2">&nbsp;</td>
                                            <td colspan="2">&nbsp;</td>
                                            <td colspan="2">&nbsp;</td>
                                            <td colspan="6">
                                                    　　　　　　　　　　<input class="inp28" type="button" id="toIndex" value="继续购买">　　　
                                                    <input class="inp28" type="submit" id="createForms" value="提交订单">
                                            </td>
                                          </tr>
                                </table>
                                </form>
</div>
	</div>
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