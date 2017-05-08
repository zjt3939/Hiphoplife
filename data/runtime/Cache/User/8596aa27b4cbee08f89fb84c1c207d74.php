<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="/hiphoplife/tpl/simplebootx/Public/js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/hiphoplife/tpl/simplebootx/Public/css/use.css">
    <link rel="stylesheet" type="text/css" href="/hiphoplife/tpl/simplebootx/Public/css/nav.css">
    <link rel="stylesheet" href="/hiphoplife/tpl/simplebootx/Public/css/animate.min.css">
    <link rel="stylesheet" href="/hiphoplife/tpl/simplebootx/Public/css/footer.css">
    <link rel="stylesheet" type="text/css" href="/hiphoplife/tpl/simplebootx/Public/css/login.css">
    <title>Hiphoplife</title>
</head>
<body>
	  <nav class="websiteNav">
        <div class="clearboth range navsubbox">
            <div class="navbox">
                <div class="logobox">
                    <img src="/hiphoplife/tpl/simplebootx/Public/images/logo1.png" alt="">
                </div>
                <ul class="navul">
                   <!--  <li>首页</li>
                    <li>街舞</li>
                    <li>涂鸦</li>
                    <li>MC</li>
                    <li>Beatbox</li> -->
                    <?php if(is_array($navData)): foreach($navData as $key=>$vo): ?><li><a href="<?php echo U($vo['href']);?>"><?php echo ($vo['label']); ?></a></li><?php endforeach; endif; ?>
                </ul>
            </div>
            <div class="loginAndRebox">
                <form action="javascript:void(0);" method="post" id="searchForm">
                     <input type="text" name="keywords" value="<?php echo ($keywords); ?>"  class="keywords" id="keywords" placeholder='按enter搜索'>
                </form>
                <?php $userData = sp_get_current_user(); $imgurl = sp_get_user_avatar_url($userData['avatar']); ?>
                <?php if(empty($userData) == true): ?><div class="loginbox loginsubbox">
                             <img src="/hiphoplife/tpl/simplebootx/Public/images/login.png" height="35px" width="35px" style="  vertical-align:bottom;"  alt="">
                        <span>未登录</span>
                        <ul class="navlbox">
                            <li><a href="<?php echo u('user/login/index',array('type'=>1));?>">登录</a></li>
                            <li><a href="<?php echo u('user/Register/index',array('type'=>2));?>">注册</a></li>
                        </ul>
                    </div><?php endif; ?>
                <?php if(empty($userData) != true): ?><div class="registerbox loginsubbox loginbox">
                        <?php if( empty($imgurl) == true): ?><img src="/hiphoplife/tpl/simplebootx/Public/images/headicon.png" height="35px" width="35px" style="  vertical-align:bottom;"  alt=""><?php endif; ?>
                        <?php if( empty($imgurl) != true): ?><img src="<?php echo ($imgurl); ?>" height="35px" width="35px" style="  vertical-align:bottom;"  alt=""><?php endif; ?>
                        <?php $name = !empty($userData['user_nicename'])?$userData['user_nicename']:$userData['user_login']; ?>
                        <span class="userNamespan"><?php echo ($name); ?></span>
                        <ul class="navlbox">
                            <li><a href="<?php echo u('user/center/index');?>">个人中心</a></li>
                            <li><a href="<?php echo u('user/index/logout');?>">退出</a></li>
                        </ul>
                    </div><?php endif; ?>
            </div>
        </div>
    </nav>
    <script>
    var keywordsText =false;
    $(function(){

        $("#keywords").on("keyup",function(){
            keywordsText = true;
        });
        $(window).on("keyup",function(e){
            if(e.keyCode==13){
                if(keywordsText){
                    var keywordVal = $("#keywords").val();
                    window.location.href = "<?php echo U('Content/Search/index');?>&keywords="+keywordVal;
                }
                // if($(".keywords").val()!=false)$("#searchForm").submit();
                // return false;
                // alert("gg");
            }
        });

    });

    function toSubmit(){
        return true;
    }

         $(window).on('scroll',function(){
             var WindowScrollTop = $(window).scrollTop();

            /*导航条的缩放*/
            if (WindowScrollTop > 50) {
                $('.websiteNav').css({ "height": "60px", "position": "fixed", "background-color": "rgba(0,0, 0,0.8)","z-index":"99999" });
                $('.navul').css("line-height", "52px");
                $('.loginsubbox').css({"top":"23px"});
                $('.keywords').css({"top":"28px"});
              
            } else {
                $('.websiteNav').css({ "height": "90px", "position": "ababsolute", "background-color": "rgba(0, 0, 0, 0.6)"});
                $('.navul').css("line-height", "80px");
                $('.loginsubbox,.keywords').css({"top":"50px"});
                $('.keywords').css({"top":"55px"});
            }
                    
                
           
        });
        /*登录注册滑动事件*/
         $('.loginsubbox').mouseover(function(){
                    $('.navlbox').slideDown();
                }).mouseleave(function(){
                    $('.navlbox').slideUp();
                });
            
              $('.navul li').on('mouseover', function () {
            $(this).addClass('animated tada');
        }).on('mouseout', function () {
            $(this).removeClass('animated tada');
        });
    </script>
	<?php echo "<script>
			$('.websiteNav').css({
				'z-index':'999',
				'background-color':'rgba(0,0,0,0.7)'
			});
			$('.loginbox').hide();
		</script>"; ?>
    <div class="loginbg">
    	<!-- 登录框 -->
        	<div class="loginoutbox">
        		            <div class="imagebox">
        		                <img src="/hiphoplife/tpl/simplebootx/Public/images/05.png" width="300px" alt="">
        		                <h3>生活，我有我的态度</h3>
        		            </div>
        		            <div class="loginPagebox">
        		                <form id="loginForm" action="javascript:void(0)">
        		                    <h2>登录账号</h2>
        		                    <div class="inputbox">
        		                          <input type="text" name="username" id="loginUsername" placeholder="请输入账号">
        		                    </div>
        		                   <div class="inputbox">
        		                       <input type="password" name="password" id="loginUserPass" placeholder="请输入密码"> 
        		                   </div>
        		                   <div class="inputbox clearboth">
        		                   <input type="text" name="verify" placeholder="请输入验证" id="loginVerify" style="width: 188px;float: left;"><?php echo sp_verifycode_img('length=4&font_size=15&width=100&height=40&charset=1234567890','id="verify_img1"');?>
        		                   <style>
        		                   	.verify_img{
        		                   		float: right;
        		                   		margin-top: 10px;
        		                   	}
        		                   </style>
        		                   </div>
        		                   <div class="inputbox checked" >
        		                       <input type="checkbox" name="terms" value="1" value="1">我同意
        		                       <a href="">网站内容服务条框</a>
        		                   </div>
        		                   <div class="inputbox" >
        		                       <input type="submit" value="登录" id="Lsubmit">
        		                   </div>
        		                </form>
        		                <div class="otherway">
        		                    <div class="registerbox"><a href="javascript:void(0)" onclick="doregister()">现在注册</a></div>
        		                    <div class="findpwd"><a href="">找回密码</a></div>
        		                </div>
        		            </div>
        		        </div>
	<!-- 注册框 -->

	<div class="registetoutbox clearboth">
		
		<div class="registerpagebox">
			<form action="javascript:void(0)" id="registerForm">
				<h2>注册账号</h2>
				<div class="inputbox">
        			<input type="text" name="username" placeholder="请输入用户名">
        		</div>
        		<div class="inputbox">
        			<input type="email" name="email" placeholder="请输入邮箱">
        		</div>
        		<div class="inputbox">
        			<input type="password" name="password" placeholder="请输入密码">
        		</div>
        		<div class="inputbox">
        			<input type="password" name="repassword" placeholder="请确认密码">
        		</div>
        		<div class="inputbox clearboth">
        			<input type="text" name="verify" placeholder="请输入验证" style="width: 188px;float: left;"><?php echo sp_verifycode_img('length=4&font_size=15&width=100&height=40&charset=1234567890','id="verify_img2"');?>
        		                   <style>
        		                   	.verify_img{
        		                   		float: right;
        		                   		margin-top: 10px;
        		                   	}
        		                   </style>
        		</div>
        		<div class="inputbox checked" >
        		                       <input type="checkbox" name="terms" value="1" value="1">我同意
        		                       <a href="">网站内容服务条框</a>
        		                   </div>
        		<div class="inputbox">
        			<input type="submit" name="submit" value="加入我们" id="Rsubmit">
        		</div>

			</form>
		</div>
		<div class="registerimgbox">
			<img src="/hiphoplife/tpl/simplebootx/Public/images/05.png" alt="">
			<h3>生活，你的态度是什么</h3>
		</div>
		<div class="otherway">
        	<div class="registerbox">
        		<a href="javascript:void(0)" onclick="dologin()">现在登录</a>
        	</div>
       		<div class="findpwd">
       		<a href="">找回密码</a>
       		</div>
        </div>
	</div>


    </div>
    <div class="returnData">
    	<h4>信息</h4>
    	<div class="returnDataInfo">
    		
    	</div>
    	<!-- <input type="button" value="确定" class="returnDatabtn" onclick="closeReturbox()"> -->
    </div>

     <footer>
		<div class="parting_line"></div>
		<div class="footer_box">
			<div class="range">
				<ul class="footer_contant clearboth">
					<li>
						<div class="erwei"><img src="/hiphoplife/tpl/simplebootx//Public/images/erwei.jpg" width="100" height="100" alt="">
						</div>
						<ul>
							<li>本站微信</li>
							<li>微信二维码扫描</li>
						</ul>
					</li>
					<li>
						<ul>
							<li>友情链接</li>
							<li><a href="">街舞酱</a></li>
							<li><a href="">街舞爱好者</a></li>
							<li><a href="">今日头条</a></li>
						</ul>
						<ul>
							<li>关于我们</li>
							<li><a href="">了解我们</a></li>
							<li><a href="">联系我们</a></li>
						</ul>
					</li>
					<li>
						<ul>
							<li>联系方式</li>
							<li class="phone_number">18814182530</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</footer>
    <script>
    var registerTime = true;
    	<?php if($type == 1): ?>$('.loginoutbox').show().addClass("animated bounceInLeft");<?php endif; ?>
	     <?php if($type == 2): ?>$('.registetoutbox').show().addClass("animated bounceInRight");<?php endif; ?>
    	function doregister(){
    		$('.loginoutbox').removeClass("animated bounceInLeft").addClass("animated bounceOutLeft");
    		setTimeout(function(){
    			$('.loginoutbox').css({"display":"none"}).removeClass("animated bounceOutLeft");
    			setTimeout(function(){
    				$('.registetoutbox').show().addClass("animated bounceInRight");
    			},100);
    		},450);
    	}

    	function dologin(){
    		$('.registetoutbox').removeClass("animated bounceInRight").addClass("animated bounceOutRight");
    		setTimeout(function(){
    			$('.registetoutbox').css({"display":"none"}).removeClass("animated bounceOutRight");
    			setTimeout(function(){
    				$('.loginoutbox').show().addClass("animated bounceInLeft");
    			},100);
    		},450);
    	}

    	function closeReturbox(){
    		$('.returnData').hide();
    	}

        function returnDataBoxAction(){
             $('.returnData').show().addClass("animated bounce");
                            setTimeout(function(){
                                closeReturbox();
                                // window.location.reload();
                                $('#verify_img1').trigger("click");

                            },1500)
        }

    	/*表单提交，提交方式是post ajax*/

    	$(function(){
    		// 登录表单提交
    		$('#loginForm').submit(function(){
                if($("#loginUsername").val()==''){
                    $('.returnDataInfo').html("用户名不能为空");
                    returnDataBoxAction();
                    return false;
                }else if($("#loginUserPass").val()==''){
                    $('.returnDataInfo').html("密码不能为空");
                    returnDataBoxAction();
                    return false;
                }else if($("loginVerify").val()==''){
                    $('.returnDataInfo').html("验证码不能为空");
                    returnDataBoxAction();
                    return false;
                }
    			$.ajax({
    				url:"<?php echo U('user/login/dologin');?>",
    				type:"POST",
    				data:$('#loginForm').serialize(),
    				success:function(data){
    					// console.log(data);
    					if(data.status==1){
    						$('.returnData h4').css({
    							'background':' #114fad url(/hiphoplife/tpl/simplebootx/Public/images/success.png)no-repeat 16px center',
    							'background-size': '1.2em'
    						});
    						$('.returnDataInfo').html("登录成功");
    						$('.returnData').show().addClass("animated bounce");
    						setTimeout(function(){
    							window.location.href= "/hiphoplife";
    						},600)

    						
    					}else{
    						$('.returnDataInfo').html(data.content);
    						$('.returnData').show().addClass("animated bounce");
    						setTimeout(function(){
    							closeReturbox();
    							// window.location.reload();
    							$('#verify_img1').trigger("click");

    						},1500)

    						
    					}
    				}
    			});
    		});

    		//注册表单提交
    		$('#registerForm').submit(function(){
    			if(registerTime){
                    $.ajax({
                        url:"<?php echo U('user/Register/doregister');?>",
                        type:"POST",
                        data:$('#registerForm').serialize(),
                        success:function(data){
                            // console.log(data);
                            if(data.status==1){

                                $('.returnData h4').css({
                                    'background':' #114fad url(/hiphoplife/tpl/simplebootx/Public/images/success.png)no-repeat 16px center',
                                    'background-size': '1.2em'
                                });
                                $('.returnDataInfo').html("注册成功，欢迎加入");
                                $('.returnData').show().addClass("animated bounce");
                                setTimeout(function(){
                                    window.location.href= "/hiphoplife";
                                },600);
                                
                            }else{
                                $('.returnDataInfo').html(data.content);
                                $('.returnData').show().addClass("animated bounce");
                                setTimeout(function(){
                                    closeReturbox();
                                    // window.location.reload();
                                    $('#verify_img2').trigger("click");
                                },1500)

                                
                            }
                        }
                    });
                    registerTime = false;
                    setTimeout(" registerTime = true",2000);
                }else{
                    $('.returnDataInfo').html("点一次就行");
                    $('.returnData').show().addClass("animated bounce");
                }
    		});

    	});

    </script>
</body>
</html>