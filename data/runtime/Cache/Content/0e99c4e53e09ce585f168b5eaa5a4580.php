<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hiphoplife</title>
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
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

    <link rel="stylesheet" href="/hiphoplife/tpl/simplebootx/Public/css/strDance.css">

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
<div class="strDanceOutBox">
	<div class="range clearboth">
		<div class="videoShowbox clearboth">
			<div class="selectBox">
				<div class="clearboth ">
					<ul class="selectUl clearboth">
						<li class="clearboth"><a href="<?php echo U('Content/Video/strDance');?>" class="allData">全部视频</a></li>
						
						<li class="clearboth"><a href="<?php echo U('Content/Video/strGather');?>" class="gatherData ">赛事专辑</a></li>
						<li class="clearboth"><a href="<?php echo U('Content/Video/strCategory');?>" class="categoryData ">舞种选择</a></li>
						<li class="clearboth"><a href="<?php echo U('Content/Video/strPost');?>" class="allPostData ">全部文章</a></li>
						<!-- <li class="clearboth">
							<form action="" id="selectForm">
							<label for="" class="">舞种</label>
							<select name="" id="">
								<option value="1">这是第一</option>
								<option value="1">这是第一</option>
								<option value="1">这是第一</option>
								<option value="1">这是第一</option>
								<option value="1">这是第一</option>
								<option value="1">这是第一</option>
								<option value="1">这是第一</option>
							</select>
						</form>
						</li> -->
					</ul>
				</div>
				
			</div>
			<div class="listVideoBox">
				<ul class="clearboth strDanceVideoul">
				<?php if(empty($strGatherData) != true): if(is_array($strGatherData)): foreach($strGatherData as $key=>$io): ?><li> 
							<a href="<?php echo U('detailGather',['gather_id'=>$io['gather_id']]);?>">
								<img src="<?php echo ($io['smeta']); ?>" alt="">
								<i class="Gathericon"></i>
								<p class="outWrite"><?php echo ($io['gather_name']); ?></p>
							</a>
						</li><?php endforeach; endif; endif; ?>
				<?php if(empty($videoData) != true): if(is_array($videoData)): foreach($videoData as $key=>$io): ?><li> 
							<a href="<?php echo U('detailone',['id'=>$io['id']]);?>">
								<img src="<?php echo ($io['smeta']); ?>" alt="">
								<i class="videoicon"></i>
								<span><?php echo ($io['hit']); ?></span>
								<p class="outWrite"><?php echo ($io['name']); ?></p>
							</a>
						</li><?php endforeach; endif; endif; ?>
				<?php if(empty($categoryData) != true): if(is_array($categoryData)): foreach($categoryData as $key=>$io): ?><li> 
							<a href="<?php echo U('OneCategory',['category_id'=>$io['category_id']]);?>">
								<i class="Gathericon"></i>
								<p class="outWrite"><?php echo ($io['category_name']); ?></p>
							</a>
						</li><?php endforeach; endif; endif; ?>
				<?php if(empty($postdata) != true): if(is_array($postdata)): foreach($postdata as $key=>$io): ?><li> 
							<a href="<?php echo U('strPostDetail',['id'=>$io['id']]);?>">
								<img src="<?php echo ($io['smeta']['thumb']); ?>" alt="">
								<i class="Pageicon"></i>
								<span><?php echo ($io['post_hits']); ?></span>
								<p class="outWrite"><?php echo ($io['post_title']); ?></p>
							</a>
						</li><?php endforeach; endif; endif; ?>
				
				</ul>
			<div class="PageList clearboth">
				<?php echo ($Page); ?>
			</div>
			</div>
		</div>
		<div class="rightBestBox clearboth">
			<div class="rightBestStrbox">
				<h3>
					<?php echo ($htitle); ?>
				</h3>
					<ul class="rightBestStrDanceUl">
					<?php $bindex =1; ?>
					<?php if(!empty($HotStrData) == true): if(is_array($HotStrData)): foreach($HotStrData as $key=>$ho): ?><li class="BestStrDanceli clearboth"><span><?php echo ($bindex); ?></span><a href="<?php echo U('detailone',['id'=>$ho['id']]);?>"><?php echo ($ho['name']); ?></a></li>
							<?php $bindex++; endforeach; endif; endif; ?>
					<?php if(!empty($BestStrPostData) == true): if(is_array($BestStrPostData)): foreach($BestStrPostData as $key=>$ho): ?><li class="BestStrDanceli clearboth"><span><?php echo ($bindex); ?></span><a href="<?php echo U('detailone',['id'=>$ho['id']]);?>"><?php echo ($ho['post_title']); ?></a></li>
								<?php $bindex++; endforeach; endif; endif; ?>
					
				</ul>
			</div>
			<!-- <div class="rightBestStrbox">
				<h3>评论数量Top9</h3>
					<ul class="rightBestStrDanceUl">
					
					<li class="BestStrDanceli clearboth"><span>1</span><a href="">Hong10 vs issei</a></li>
					<li class="BestStrDanceli clearboth"><span>2</span><a href="">Hong10 vs issei</a></li>
					<li class="BestStrDanceli clearboth"><span>3</span><a href="">Hong10 vs issei</a></li>
					<li class="BestStrDanceli clearboth"><span>4</span><a href="">Hong10 vs issei</a></li>
					<li class="BestStrDanceli clearboth"><span>5</span><a href="">Hong10 vs issei</a></li>
					<li class="BestStrDanceli clearboth"><span>6</span><a href="">Hong10 vs issei</a></li>
					<li class="BestStrDanceli clearboth"><span>7</span><a href="">Hong10 vs issei</a></li>
					<li class="BestStrDanceli clearboth"><span>8</span><a href="">Hong10 vs issei</a></li>
					<li class="BestStrDanceli clearboth"><span>9</span><a href="">Hong10 vs issei</a></li>
				</ul>
			</div>
			 -->
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
<script>
	$('.websiteNav').css({
		"background-color":"rgba(0,0,0,0.5)",
		"z-index":"2"
	});
	$(function(){
		// alert($(window).height());
		$(".strDanceVideoul li").show().addClass("animated bounceIn");
		$(".PageList").show().addClass("animated bounceIn");
		$(".<?php echo ($active); ?>").addClass("underLine");
	});

	 $('.strDanceVideoul li').mouseover(function(){
         $(this).find('img').addClass('animated pulse');
         $(this).find('i').addClass('animated pulse');
     }).mouseleave(function(){
         $(this).find('img').removeClass('animated pulse');
         $(this).find('i').removeClass('animated pulse');
     });
</script>
</html>