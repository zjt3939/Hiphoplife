<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title><?php echo ($site_name); ?></title>
<meta name="keywords" content="<?php echo ($site_seo_keywords); ?>" />
<meta name="description" content="<?php echo ($site_seo_description); ?>">
<meta name="author" content="ThinkCMF">
	<?php $portal_index_lastnews=2; $portal_hot_articles="1,2"; $portal_last_post="1,2"; $tmpl=sp_get_theme_path(); $default_home_slides=array( array( "slide_name"=>"ThinkCMFX1.6.0发布啦！", "slide_pic"=>$tmpl."Public/images/demo/1.jpg", "slide_url"=>"", ), array( "slide_name"=>"ThinkCMFX1.6.0发布啦！", "slide_pic"=>$tmpl."Public/images/demo/2.jpg", "slide_url"=>"", ), array( "slide_name"=>"ThinkCMFX1.6.0发布啦！", "slide_pic"=>$tmpl."Public/images/demo/3.jpg", "slide_url"=>"", ), ); ?>
	<meta name="author" content="ThinkCMF">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
	<link rel="icon" href="/hiphoplife/tpl/simplebootx/Public/images/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="/hiphoplife/tpl/simplebootx/Public/images/favicon.ico" type="image/x-icon">
	<script src="/hiphoplife/tpl/simplebootx/Public/js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/hiphoplife/tpl/simplebootx/Public/css/use.css">
    <link rel="stylesheet" href="/hiphoplife/tpl/simplebootx/Public/css/animate.min.css">
    <link rel="stylesheet" href="/hiphoplife/tpl/simplebootx/Public/css/footer.css">
   	<link rel="stylesheet" type="text/css" href="/hiphoplife/tpl/simplebootx/Public/css/nav.css">

<style>
.control-label{
	font-weight: bold;
	float: left;
	width: 70px;
}
</style>
</head>
<body class="body-white" id="top">
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
                <form action="<?php echo U('Content/Search/index');?>" method="post" id="searchForm">
                     <input type="text" name="keywords" value="<?php echo ($keywords); ?>"  class="keywords" id="keywords" placeholder='按enter搜索'>
                </form>
                <?php $userData = sp_get_current_user(); $imgurl = sp_get_user_avatar_url($userData['avatar']); ?>
                <?php if(empty($userData) == true): ?><div class="loginbox loginsubbox">
                             <img src="/hiphoplife/tpl/simplebootx/Public/images/login.png" height="32px" width="32px" style="  vertical-align:bottom;"  alt="">
                        <span>未登录</span>
                        <ul class="navlbox">
                            <li><a href="<?php echo u('user/login/index',array('type'=>1));?>">登录</a></li>
                            <li><a href="<?php echo u('user/Register/index',array('type'=>2));?>">注册</a></li>
                        </ul>
                    </div><?php endif; ?>
                <?php if(empty($userData) != true): ?><div class="registerbox loginsubbox loginbox">
                        <?php if( empty($imgurl) == true): ?><img src="/hiphoplife/tpl/simplebootx/Public/images/headicon.png" height="32px" width="32px" style="  vertical-align:bottom;"  alt=""><?php endif; ?>
                        <?php if( empty($imgurl) != true): ?><img src="<?php echo ($imgurl); ?>" height="32px" width="32px" style="  vertical-align:bottom;"  alt=""><?php endif; ?>
                        <?php $name = !empty($userData['user_nicename'])?$userData['user_nicename']:$userData['user_login']; ?>
                        <span><?php echo ($name); ?></span>
                        <ul class="navlbox">
                            <li><a href="<?php echo u('user/center/index');?>">个人中心</a></li>
                            <li><a href="<?php echo u('user/index/logout');?>">退出</a></li>
                        </ul>
                    </div><?php endif; ?>
            </div>
        </div>
    </nav>
    <script>
    $(function(){
        $(window).on("keyup",function(e){
            if(e.keyCode==13){
                if($(".keywords").val()!=false)$("#searchForm").submit();
                return false;
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

		<div class="container tc-main">
                <div class="row">
                
                <div class="tabs offset2 span8">
                               <!-- <ul class="nav nav-tabs">
                                   <li class="active"><a href="#one" data-toggle="tab"><i class="fa fa-list-alt"></i>个人中心</a></li>
                               </ul> -->
                               <div class="tab-content">
                                   <div class="tab-pane active" id="one">
                                   		<div class="span3">
						                	<a href="javascript:;">
						                	<?php if(empty($avatar)): ?><img src="/hiphoplife/tpl/simplebootx//Public/images/headicon_128.png" class="headicon"/>
								            <?php else: ?>
								            <img src="<?php echo sp_get_user_avatar_url($avatar);?>" class="headicon"/><?php endif; ?>
								          	</a>
							          	</div>
							          	<div class="span3">
					               			<div class="control-group">
					               				<label class="control-label" for="input-user_nicename">昵称</label>
					               				<div class="controls">
					               					<?php echo ((isset($user_nicename) && ($user_nicename !== ""))?($user_nicename):'未填写'); ?>
					               				</div>
					               			</div>
					               			<div class="control-group">
					               				<label class="control-label" for="input-sex">性别</label>
					               				<div class="controls">
					               				<?php $sexs=array("0"=>"保密","1"=>"程序猿","2"=>"程序媛"); ?>
					               					<?php echo ($sexs[$sex]); ?>
					               				</div>
					               			</div>
					               			<div class="control-group">
					               				<label class="control-label" for="input-birthday">生日</label>
					               				<div class="controls">
					               					<?php echo ((isset($birthday) && ($birthday !== ""))?($birthday):'未填写'); ?>
					               				</div>
					               			</div>
					               			<div class="control-group">
					               				<label class="control-label" for="input-user_url">个人网址</label>
					               				<div class="controls">
					               					<?php echo ((isset($user_url) && ($user_url !== ""))?($user_url):'未填写'); ?>
					               				</div>
					               			</div>
					               			<div class="control-group">
					               				<label class="control-label" for="input-signature">个性签名</label>
					               				<div class="controls">
					               					<?php echo ((isset($signature) && ($signature !== ""))?($signature):'未填写'); ?>
					               				</div>
					               			</div>
					               		</div>
                                   </div>
                               </div>							
                 </div>
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

	</div>
	<!-- /container -->

	<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/hiphoplife/",
    JS_ROOT: "statics/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/hiphoplife/statics/js/jquery.js"></script>
    <script src="/hiphoplife/statics/js/wind.js"></script>
    <script src="/hiphoplife/tpl/simplebootx/Public/simpleboot/bootstrap/js/bootstrap.min.js"></script>
    <script src="/hiphoplife/statics/js/frontend.js"></script>
	<script>
	$(function(){
		$('body').on('touchstart.dropdown', '.dropdown-menu', function (e) { e.stopPropagation(); });
		
		$("#main-menu li.dropdown").hover(function(){
			$(this).addClass("open");
		},function(){
			$(this).removeClass("open");
		});
		
		$.post("<?php echo U('user/index/is_login');?>",{},function(data){
			if(data.status==1){
				if(data.user.avatar){
					$("#main-menu-user .headicon").attr("src",data.user.avatar.indexOf("http")==0?data.user.avatar:"/hiphoplife/data/upload/avatar/"+data.user.avatar);
				}
				
				$("#main-menu-user .user-nicename").text(data.user.user_nicename!=""?data.user.user_nicename:data.user.user_login);
				$("#main-menu-user li.user.login").show();
				
			}
			if(data.status==0){
				$("#main-menu-user li.user.offline").show();
			}
			
		});	
		;(function($){
			$.fn.totop=function(opt){
				var scrolling=false;
				return this.each(function(){
					var $this=$(this);
					$(window).scroll(function(){
						if(!scrolling){
							var sd=$(window).scrollTop();
							if(sd>100){
								$this.fadeIn();
							}else{
								$this.fadeOut();
							}
						}
					});
					
					$this.click(function(){
						scrolling=true;
						$('html, body').animate({
							scrollTop : 0
						}, 500,function(){
							scrolling=false;
							$this.fadeOut();
						});
					});
				});
			};
		})(jQuery); 
		
		$("#backtotop").totop();
		
		
	});
	</script>


</body>
</html>