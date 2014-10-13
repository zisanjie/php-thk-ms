$(function(){
	//如果是必填的加上红*标识
	$("#zhuce :input.inpb30").each(function(){
		var $inpb30 = $("<strong class='red'>*</strong>");//创建*元素
		$(this).parent().append($inpb30); //然后将它追加到文档中
	});
	$("#zhuce :input").blur(function(){
		var $parent=$(this).parent();
		$parent.find(".formtips").remove();
		 //验证邮件
		 if( $(this).is('#email') ){
			if( this.value=="" || ( this.value!="" && !/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/.test(this.value) ) ){
				$(this).css('background','#FCFAFA');	
				var errorMsg = '请注意输入正确的E-Mail地址.';
				$parent.append('<span class="formtips onError">'+errorMsg+'</span>');
			}else{
				$(this).css('background','white');
				var trueMsg = 'E-mail格式正确.';
				$parent.append('<span class="formtips onTrue">'+trueMsg+'</span>');
			}
		 }
		//验证用户名
		 if( $(this).is('#username') ){
				if( this.value==""  || ( this.value!="" && !/^\w{2,16}$/.test(this.value) )){
				    var errorMsg2 = '请输入2-16位的字符.';
				    $(this).css('background','#FCFAFA');	
                   			    $parent.append('<span class="formtips onError">'+errorMsg2+'</span>');
				}else{

				//AJAX连接数据库判断用户是否存在
					var name=$("#username").val();
					 $.post('__APP__/Index/yzuser/',{username:name},function(jdata){
					 	if(jdata.data=="exist"){
						     var exist = '该用户名已存在.';

						     $parent.append('<span class="formtips onError">'+exist+'</span>');	
						}else{
						    $(this).css('background','white');
						    var trueMsg2 = '用户名格式正确.';
						    $parent.append('<span class="formtips onTrue">'+trueMsg2+'</span>');
						}
					});  
				}
		 }
		 //验证密码
		 if( $(this).is('#userpwd') ){
		 	if(this.value=="" || ( this.value!="" && !/^[A-Za-z0-9]{4,}$/.test(this.value) ) ){
				$(this).css('background','#FCFAFA');	
				var errorMsg3 = '请输入至少4位的密码!';
				$parent.append('<span class="formtips onError">'+errorMsg3+'</span>');
			}else{
				$(this).css('background','white');
				var trueMsg3 = '密码格式正确.';
				$parent.append('<span class="formtips onTrue">'+trueMsg3+'</span>');
			}
		}

		}).keyup(function(){
		   $(this).triggerHandler("blur");
		}).focus(function(){
	  	   $(this).triggerHandler("blur");
		});

		//提交，最终验证。
		 $('#reg_submit').click(function(){
				$("form :input.inpb30").trigger('blur');
				var numError = $('#zhuce .onError').length;
				if(numError){
					return false;
				}
		 });
});

$(function(){
	//如果是必填的加上红*标识
	$("#con :input.inpb30").each(function(){
		var $inpb30 = $("<strong class='xing'>*</strong>");//创建*元素
		$(this).parent().append($inpb30); //然后将它追加到文档中
	});
	$("#con :input").blur(function(){
	var $parent=$(this).parent();
	$parent.find(".formcon").remove();
	//验证用户名
	 if( $(this).is('#username') ){
		if( this.value==""  || ( this.value!="" && !/^\w{2,16}$/.test(this.value) )){
		    	$(this).css('background','#FCFAFA');	
		}else{
			$(this).css('background','white');
			var trueMsg = '用户名格式正确.';
			$parent.append('<span class="formcon onTrue">'+trueMsg+'</span>');					    
		}
	 }
	 //验证密码
	 if( $(this).is('#userpwd') ){
	 	if(this.value=="" || ( this.value!="" && !/^[A-Za-z0-9]{4,}$/.test(this.value) ) ){
			$(this).css('background','#FCFAFA');	
		}else{
			$(this).css('background','white');

		}
	}

	}).keyup(function(){
	   $(this).triggerHandler("blur");
	}).focus(function(){
		  	   $(this).triggerHandler("blur");
			});

			//提交，最终验证。
			 $('#login_submit').click(function(){
					$("form :input.inpb30").trigger('blur');
					var numError = $('#con .onError').length;
					if(numError){
						return false;
					}
			 });
});
