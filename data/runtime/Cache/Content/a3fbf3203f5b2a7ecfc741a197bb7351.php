<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hiphoplife</title>
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

    <link rel="stylesheet" href="/hiphoplife/tpl/simplebootx/Public/css/videoDetail.css">
   

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
	
<div class="videoDetailOutbox">
	<div class="range clearboth">
		<div class="fillempty"></div>
		<div class="DetailContentbox">

			<div class="pagePath"><a href="<?php echo U('Portal/index/index');?>">首页</a>&nbsp;&gt;&nbsp;<a href="<?php echo U('Content/Video/strDance');?>">街舞</a>&nbsp;&gt;&nbsp;<?php echo ($videoDetailData['name']); ?></div>
			<h2><?php echo ($videoDetailData['name']); ?></h2>
			<!-- <h2><?php echo ($videoDetailData['id']); ?></h2> -->
			<div class="videoOutbox">
				<?php if($videoDetailData['type'] == 0): ?><iframe src="<?php echo ($videoDetailData['url']); ?>" allowtransparency="true" scrolling="no" border="0" frameborder="0" style="height: 500px;width: auto; margin: 0px auto;">]
                   	</iframe><?php endif; ?>
                <?php if($videoDetailData['type'] == 1): ?><div style="height:500px;">
	                	<video id="sdvideo1" class="video-js vjs-big-play-centered sdvideo1" style="height:500px;width: auto;margin: 0px auto;" controls >
	                    <source src="<?php echo ($videoDetailData['url']); ?>" type="video/mp4">
	                    </video>

	                </div><?php endif; ?>
			</div>
			<div class="videotoolbox"><span><?php echo ($videoDetailData['last_update_time']); ?></span> <span class="videoHits"><?php echo ($videoDetailData['hit']); ?></span></div>
			<div class="commentOutbox clearboth">
				<?php echo Comments("video",$videoDetailData['id']);?>
			</div>
			<div class="Pagelist">
				<?php echo ($Page); ?>
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
</body>
</html>