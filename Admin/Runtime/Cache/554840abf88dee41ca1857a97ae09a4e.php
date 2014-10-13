<?php if (!defined('THINK_PATH')) exit(); if(!session('?mid')){?>
    <script type="text/javascript">window.location.href="__APP__/Index/index";</script>
<?php }?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>快达汽车管理</title>
<link rel="stylesheet" href="__PUBLIC__/Admin/tpl/css/style.default.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/Admin/tpl/prettify/prettify.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/Admin/tpl/css/style.<?php echo (session('color')); ?>.css" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/Admin/tpl/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/tpl/js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/tpl/js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/tpl/js/bootstrap.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/tpl/js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/tpl/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/tpl/prettify/prettify.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/tpl/js/jquery.cookie.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/tpl/js/custom.js"></script>
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
                    </ul>
                </li><?php endif; ?>
                <?php if($_SESSION['mroles']== 1 or $_SESSION['mroles']== 2): ?><li class="dropdown"><a href=""><span class="icon-th"></span> 单位管理</a>
                    <ul>
                        <li><a href="__APP__/Departments/listPage">单位列表</a></li>
                    </ul>
                </li><?php endif; ?>
                <?php if($_SESSION['mroles']== 1 or $_SESSION['mroles']== 2): ?><li class="dropdown"><a href=""><span class="icon-th"></span> 客户管理</a>
                    <ul>
                        <li><a href="__APP__/Customers/listPage">客户列表</a></li>
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
                <li><a href="#">车辆管理</a> <span class="divider">/</span></li>
                <li class="active">修改车辆</li>
            </ul>
        </div><!--breadcrumbs-->
        <div class="pagetitle">
            <h1>修改车辆</h1> <span>用来修改车辆信息</span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
            <div class="contentinner">
            
                <h4 class="widgettitle">修改车辆</h4>
                <form class="form-horizontal" id="form-validate" action="__APP__/Foods/up" method="post" enctype="multipart/form-data" />
                    <table id="datatables" class="table table-bordered table-striped responsive">
                              <tr>
                                <td rowspan='7'></td>
                                <td width="42%" rowspan="7" style="border-left:0px;">
                                <img src="__ROOT__/Uploads/Foods/<?php echo ($data["pic"]); ?>" width="400" height='300'/>
                                </td>
                                <th width="17%">名称</th>
                                <td width="41%">
                                  <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>" />
                                  <input type="text" name='name'  class="grd-white" value="<?php echo ($data["name"]); ?>"/>
                                </td>
                              </tr>
                              <tr>
                                <th>上传</th>
                                <td><input type="file" class="grd-white" name="pic" id="pic" /></td>
                              </tr>
                              <tr>
                                  <th>价格</th>
                                  <td>
                                  <input type="text" name='price' class="grd-white" value="<?php echo ($data["price"]); ?>"/>
                                  </td>
                            </tr>
                            <tr>
                                  <th>上架时间</th>
                                  <td><?php echo (date("Y-m-d H:i:s",$data["regtime"])); ?></td>
                             </tr>
                            <tr>
                                  <th>所属分类</th>
                                  <td>
                                        <select name="cid" id="sname" class="grd-white">
                                                <?php if(is_array($sdata)): $i = 0; $__LIST__ = $sdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vc): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vc["id"]); ?>" <?php echo ($vc['id']==$data['cid']?'selected':''); ?>>
                                                            <?php echo ($vc["sname"]); ?>
                                                        </option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                  </td>
                             </tr>
                            <tr>
                                  <th>排行</th>
                                  <td>
                                  <input type="text" name='orderno' class="grd-white" value="<?php echo ($data["orderno"]); ?>"/>
                                  </td>
                            </tr>
                            <tr>
                                  <th height="41">状态</th>
                                  <td>
                                    <select name="status" >
                                          <option value="1" <?php echo ($data['status']==1?'selected':''); ?>>
                                              在售
                                          </option>
                                          <option value="2" <?php echo ($data['status']!=1?'selected':''); ?>>
                                            下架
                                          </option>
                                    </select>
                                  </td>
                            </tr>
                            <tr height='100' class="describe">
                                  <th height="50" >车辆描述</th>
                                  <td colspan="3">
                                    <textarea name='describe' cols='93' rows='5' style="height:100px;width:98%; resize:none;" /><?php echo ($data["describe"]); ?></textarea>
                                  </td>
                            </tr>
                            <tr>
                                  <td height="50" colspan="4" >
                                        <button type="submit" class="btn btn-primary">修改</button>
                                  </td>
                            </tr>
                        </tbody>
                    </table>
                    </form>     
                
               <!--  <div class="divider15"></div>
               
               <pre class="prettyprint linenums">//Include this script in your document &lt;head&gt;
               &lt;script type=&quot;text/javascript&quot; src=&quot;js/jquery.dataTables.min.js&quot;&gt;&lt;/script&gt;</pre>
               
               <div class="divider15"></div>
               
               <pre class="prettyprint linenums">// dynamic table<br>jQuery('#dyntable').dataTable({
                  &quot;sPaginationType&quot;: &quot;full_numbers&quot;,
                  &quot;aaSortingFixed&quot;: [[0,'asc']],
                  &quot;fnDrawCallback&quot;: function(oSettings) {
                     jQuery.uniform.update();
                  }<br>});<br></pre>
                  
                                <div class="divider15"></div>
                  
                                <pre class="prettyprint linenums">&lt;table class=&quot;table table-bordered&quot; id=&quot;dyntable&quot;&gt;</pre> -->
                
                
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

</body>
</html>