<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <link rel="stylesheet" href="/hiphoplife/tpl/simplebootx/Public/css/video-js.css">
    <link rel="stylesheet" type="text/css" href="/hiphoplife/tpl/simplebootx/Public/css/index.css">
    <script src="/hiphoplife/tpl/simplebootx/Public/js/video.min.js"></script>
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
    <!--<nav>
        
    </nav>-->
    <div class="videobox" >
        <video class="videoContent" src="/hiphoplife/tpl/simplebootx/Public/images/video.mp4" autoplay muted   id="video">
        </video>
        <!--<div class="WebPurport">
            <div class="blackLump"><span><span style="color:#dfcb11z; "style="color:#dfcb11; ">love</span>&</span></div>
            <div class="whiteLump"><span>&<span style="color:#dfcb11; ">Peace</span></span></div>
            <p class="videoP"><span>Love</span><span>Peace</span></p>
        </div>-->
        <div class="websitepurport">
          <img src="/hiphoplife/tpl/simplebootx/Public/images/05.png" alt="">
        </div>

    </div>
  <!-- 最火视频 -->
    <div class="hotmain" style=" background:#000 url('/hiphoplife/tpl/simplebootx/Public/images/bg04.png')no-repeat;
            background-position: center center;
            background-size:cover;">
        <div class="paddingbox1"></div>
        <div class="range Contentbox">
            <div class="hotVideobox">
                <div class="ContentTitle">
                    <img src="/hiphoplife/tpl/simplebootx/Public/images/hotVideo.png" alt="">
                    <p>HOTTEST VIDEO</p>
                </div>
                <div class="Videocontent">
                    <ul class="clearboth vcontentul">
                        <li>
                            <div class="vlibox">
                            <!--<iframe src="http://www.tudou.com/programs/view/html5embed.action?type=0&amp;code=S2bef9d1lbU&amp;lcode=&amp;resourceId=351669951_06_05_99" allowtransparency="true" scrolling="no" border="0" frameborder="0" style="width: 100%; height: 380px;"></iframe>-->
                            	<?php if($hotvideoData[0]['type'] == 0): ?><iframe src="<?php echo ($hotvideoData[0]['url']); ?>" allowtransparency="true" scrolling="no" border="0" frameborder="0" style="width: 100%; height: 380px;"></iframe><?php endif; ?>
                               
                               <?php if($hotvideoData[0]['type'] == 1): ?><video id="sdvideo1" class="video-js vjs-big-play-centered sdvideo1" controls >
	                                <source src="<?php echo ($hotvideoData[0]['url']); ?>" type="video/mp4">
	                               </video><?php endif; ?>
                               <!--<i class="controls"></i>
                                <div class="vimgbox">
                                    <img src="/hiphoplife/tpl/simplebootx/Public/images/a.jpg"  alt="">
                                </div>-->
                            </div>
                        </li>
                        <!--  -->
                        <?php $index = 2; ?>
                        <?php if(is_array($hotvideoData)): $i = 0; $__LIST__ = array_slice($hotvideoData,1,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ho): $mod = ($i % 2 );++$i;?><li>
                            <a href="<?php echo U('Content/Video/detailone',['id'=>$ho['id']]);?>" class="videourl">
                                <div class="vlibox">
                                    <div class="vimgbox">
                                        <img src="<?php echo ($ho['smeta']); ?>"  alt="">
                                    </div>
                                    <div class="rankVideo">
                                        <?php echo ($index); ?>
                                        <?php $index++; ?>
                                    </div>
                                    <div class="videoNamebox">
                                        <div class="videoName skew">
                                            <p class="skew-inner hotvideoname" ><?php echo ($ho['name']); ?></p>
                                            <span><?php echo ($ho['create_time']); ?></span> <i><?php echo ($ho['commentsum']); ?></i><c><?php echo ($ho['hit']); ?></c>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
     <!-- 最新视频 -->
    <div class="hotmain" style="background:#fff url('/hiphoplife/tpl/simplebootx/Public/images/world.png')no-repeat;
            background-position: center center;
            background-size:cover;">
        <div class="paddingbox2"></div>
        <div class="range Contentbox">
            <div class="ContentTitle">
                <img src="/hiphoplife/tpl/simplebootx/Public/images/newVideo.png" alt="">
                <p style="color:#000;font-weight:bolder;">HOTTEST VIDEO</p>
            </div>
            <div class="newVideoContent">
                <ul class="newVideoul clearboth">
                <?php if(is_array($newvideodata)): foreach($newvideodata as $key=>$no): ?><li>
                        <a href="<?php echo U('Content/Video/detailone',['id'=>$ho['id']]);?>" class="videourl">
                            <img src="<?php echo ($no['smeta']); ?>" alt="" class="newImg">
                            <div class="newVideoName">
                                <p><?php echo ($no['name']); ?></p>
                                <span> <?php echo ($no['create_time']); ?></span><j><?php echo ($no['commentsum']); ?></j><c><?php echo ($no['hit']); ?></c>
                            </div>
                        </a>
                    </li><?php endforeach; endif; ?>
                </ul>
            </div>
        </div>
    </div>
<!-- 最新涂鸦 -->
    <div class="hotmain" style="background:#000 url('/hiphoplife/tpl/simplebootx/Public/images/world 2.png')no-repeat;
            background-position: center center;
            background-size:cover;">
        <div class="paddingbox3"></div>
        <div class="range Contentbox">
            <div class="ContentTitle">
                <img src="/hiphoplife/tpl/simplebootx/Public/images/newScrawl.png" alt="">
                <p style="color:#eaeaea;">LASTEST SCRAWL</p>
            </div>
            <div class="newScrawlContent">
                <ul class="newScrawlul clearboth">
                <?php if(is_array($newImageData)): foreach($newImageData as $key=>$io): ?><li>
                        <a href="<?php echo U('Content/Scrawl/detailone',['id'=>$io['id']]);?>">
                            <div class="Simgbox">
                                <img src="<?php echo ($io['smeta']); ?>" alt="" class="Simg">
                            </div>
                            <div class="ScrawNameinfo">
                                <div class="ScrawName outWrite"><?php echo ($io['name']); ?></div>
                                <p class="clearboth">
                                    <span><?php echo ($io['create_time']); ?> </span><j><?php echo ($io['commentsum']); ?></j><c><?php echo ($io['hit']); ?></c>
                                </p>
                                <div class="Scrawauthor outWrite">作者：<?php echo ($io['author']); ?></div>
                            </div>
                        </a>
                    </li><?php endforeach; endif; ?>
                </ul>
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
    <script>
     /*   var fullscreenclicknum =1;
        function isInteger(obj) {
            return (obj | 0) === obj
        }*/
        /*页面加载后*/
        $(function () {
            /*网站主旨*/
            $('#video').on('ended', function () {
                // $('.videoContent').hide();
                $('.websitepurport').show().addClass('animated fadeInRightBig');
            })
            /*加载后动画*/
            $('.websiteNav,.videobox').addClass('animated flash');
            //视频全屏触发事件
            $('.vjs-fullscreen-control').on('click',function(){
                /*if(isInteger(fullscreenclicknum/2)){
                     $('.websiteNav').show();
                }else{
                    $('.websiteNav').hide();
                }
                fullscreenclicknum++; */
                $('#sdvideo1').css("height","100%");
                               
            });
            //hotVideo 视频名称滑出特效
            $('.vcontentul li').mouseover(function(){
                $(this).find('.videoNamebox').addClass('animated slideInLeft').show();
            }).mouseleave(function(){
                $(this).find('.videoNamebox').hide();
            });

            //newVideo 动画
            $('.newVideoul li').mouseover(function(){
                $(this).find('.newImg').addClass('animated pulse');
            }).mouseleave(function(){
                $(this).find('.newImg').removeClass('animated pulse');
            });

            //.newScrawlul
            $('.Simgbox').mouseover(function(){
                $(this).find('.Simg').addClass('animated pulse');
            }).mouseleave(function(){
                $(this).find('.Simg').removeClass('animated pulse');
            })

        })
        // $('#video').on('click', function () {
        //     $('#video').pause();
        // })
      

        /*视频滚动触发事件*/
        window.onscroll = function () {
            var WindowScrollTop = $(window).scrollTop();
            /*滚动高度大于一个视口时，视频结束播放*/
            if(WindowScrollTop>$(window).height()){
                // console.log(document.getElementById('video').duration);
                var video = document.getElementById('video');
                video.currentTime= parseFloat(document.getElementById('video').duration);
               $('#video').trigger('ended');
            }else if(WindowScrollTop>$(window).height()/3){
             /* $('.vcontentul>li:nth-child(2n)').addClass('animated bounceInLeft').show();
               $('.vcontentul>li:nth-child(2n+1)').addClass('animated bounceInRight').show();*/
            }
        }


    </script>
    <?php if($hotvideoData[0]['type'] == 1): ?><script type="text/javascript">
			var myPlayer = videojs('sdvideo1');
		</script><?php endif; ?>
  
</body>

</html>