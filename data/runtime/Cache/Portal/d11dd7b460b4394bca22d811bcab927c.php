<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
	<html>
	<head>
		<title><?php echo ($post_title); ?> <?php echo ($site_name); ?> </title>
		<meta name="keywords" content="<?php echo ($post_keywords); ?>" />
		<meta name="description" content="<?php echo ($post_excerpt); ?>">
			<?php $portal_index_lastnews=2; $portal_hot_articles="1,2"; $portal_last_post="1,2"; $tmpl=sp_get_theme_path(); $default_home_slides=array( array( "slide_name"=>"ThinkCMFX1.6.0发布啦！", "slide_pic"=>$tmpl."Public/images/demo/1.jpg", "slide_url"=>"", ), array( "slide_name"=>"ThinkCMFX1.6.0发布啦！", "slide_pic"=>$tmpl."Public/images/demo/2.jpg", "slide_url"=>"", ), array( "slide_name"=>"ThinkCMFX1.6.0发布啦！", "slide_pic"=>$tmpl."Public/images/demo/3.jpg", "slide_url"=>"", ), ); ?>
	<meta name="author" content="ThinkCMF">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    
    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">

   	<!-- No Baidu Siteapp-->
    <meta http-equiv="Cache-Control" content="no-siteapp"/>

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
	<link rel="icon" href="/hiphoplife/tpl/simplebootx/Public/images/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="/hiphoplife/tpl/simplebootx/Public/images/favicon.ico" type="image/x-icon">
    <link href="/hiphoplife/tpl/simplebootx/Public/simpleboot/themes/cmf/theme.min.css" rel="stylesheet">
    <link href="/hiphoplife/tpl/simplebootx/Public/simpleboot/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="/hiphoplife/tpl/simplebootx/Public/simpleboot/font-awesome/4.2.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
	<!--[if IE 7]>
	<link rel="stylesheet" href="/hiphoplife/tpl/simplebootx/Public/simpleboot/font-awesome/4.2.0/css/font-awesome-ie7.min.css">
	<![endif]-->
	<link href="/hiphoplife/tpl/simplebootx/Public/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="/hiphoplife/tpl/simplebootx/Public/css/nav.css">	<link rel="stylesheet" href="/hiphoplife/tpl/simplebootx/Public/css/nav.css">
	<style>
		/*html{filter:progid:DXImageTransform.Microsoft.BasicImage(grayscale=1);-webkit-filter: grayscale(1);}*/
		#backtotop{position: fixed;bottom: 50px;right:20px;display: none;cursor: pointer;font-size: 50px;z-index: 9999;}
		#backtotop:hover{color:#333}
		#main-menu-user li.user{display: none}
	</style>
	
		<style>
			.clearboth:after{
				content: "";
				display: block;
				clear: both;
			}
			#article_content img{height:auto !important}
			#top_title{
				text-align: center;
				font-style: #875b36;
			}
			.top10>.content{
				float: left;
/* 				width: 50%; */
			
				margin: 0px auto;
			}
			.top10>.left_side{
				width: 24%;
				height: 100%;
				float: left;
			}
			.top10>.right_side{
				width: 24%;
				height: 100%;
				float: right;
			}
			.top10>.content>h1{
				text-shadow: 1px 1px 3px #875b36;
				padding:10px 0px;
				background-color:#232427;
				box-shadow: 0px 0px 3px #5c5c76;
			}
			.top10>.content>.rankbox{

				height: 200px;
				background-color:#232427;
				box-shadow: 0px 0px 3px #5c5c76;
				margin-top: 5px;
				transition: all 1s ease ;
				backface-visibility:visible;
			}

			.rankbox:hover{
				-webkit-transform-style:preserve-3d;
				transform: rotateX(360deg);
			}
			.ranknum{
				margin-top: 25px;
				margin-left: 10px;
				border-radius: 50%;
				width:150px;
				height:150px;
				float: left;
				line-height: 150px;
				text-align: center;
				font-size: 12px;
			}
			.rankbox:nth-of-type(1) .ranknum{
				background:url(/hiphoplife/tpl/simplebootx/Public/images/金牌.png) no-repeat;
				background-position: center center;	
			}
			.rankbox:nth-of-type(2) .ranknum{
				background:url(/hiphoplife/tpl/simplebootx/Public/images/银牌.png) no-repeat;
				background-position: center center;	
			}
			.rankbox:nth-of-type(3) .ranknum{
				background:url(/hiphoplife/tpl/simplebootx/Public/images/铜牌.png) no-repeat;
				background-position: center center;	
			}


		</style>
	</head>
<body class="<?php echo ($name); ?>">
<?php echo hook('body_start');?>
<div class="navbar navbar-fixed-top" >
   <div class="navbar-inner">
     <div class="container">
       <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </a>
       <a class="brand" href="/hiphoplife/"><img src="/hiphoplife/tpl/simplebootx/Public/images/logo.png"/></a>
       <div class="nav-collapse collapse" id="main-menu">
       	<?php
 $effected_id=""; $filetpl="<a href='\$href' target='\$target'>\$label</a>"; $foldertpl="<a href='\$href' target='\$target' class='dropdown-toggle' data-toggle='dropdown'>\$label <b class='caret'></b></a>"; $ul_class="dropdown-menu" ; $li_class="" ; $style="nav"; $showlevel=6; $dropdown='dropdown'; echo sp_get_menu("main",$effected_id,$filetpl,$foldertpl,$ul_class,$li_class,$style,$showlevel,$dropdown); ?>
		
		<ul class="nav pull-right" id="main-menu-user">
			<li class="dropdown user login">
	            <a class="dropdown-toggle user" data-toggle="dropdown" href="#">
	            <img src="/hiphoplife/tpl/simplebootx//Public/images/headicon.png" class="headicon"/>
	            <span class="user-nicename"></span><b class="caret"></b></a>
	            <ul class="dropdown-menu pull-right">
	               <li><a href="<?php echo u('user/center/index');?>"><i class="fa fa-user"></i> &nbsp;个人中心</a></li>
	               <li class="divider"></li>
	               <li><a href="<?php echo u('user/index/logout');?>"><i class="fa fa-sign-out"></i> &nbsp;退出</a></li>
	            </ul>
          	</li>
          	<li class="dropdown user offline">
	            <a class="dropdown-toggle user" data-toggle="dropdown" href="#">
	           		<img src="/hiphoplife/tpl/simplebootx//Public/images/headicon.png" class="headicon"/>登录<b class="caret"></b>
	            </a>
	            <ul class="dropdown-menu pull-right">
	               <li><a href="<?php echo U('api/oauth/login',array('type'=>'sina'));?>"><i class="fa fa-weibo"></i> &nbsp;微博登录</a></li>
	               <li><a href="<?php echo U('api/oauth/login',array('type'=>'qq'));?>"><i class="fa fa-qq"></i> &nbsp;QQ登录</a></li>
	               <li><a href="<?php echo u('user/login/index');?>"><i class="fa fa-sign-in"></i> &nbsp;登录</a></li>
	               <li class="divider"></li>
	               <li><a href="<?php echo u('user/register/index');?>"><i class="fa fa-user"></i> &nbsp;注册</a></li>
	            </ul>
          	</li>
		</ul>
		<div class="pull-right">
        	<form method="post" class="form-inline" action="<?php echo U('portal/search/index');?>" style="margin:18px 0;">
				 <input type="text" class="" placeholder="Search" name="keyword" value="<?php echo I('get.keyword');?>"/>
				 <input type="submit" class="btn btn-info" value="Go" style="margin:0"/>
			</form>
		</div>
       </div>
     </div>
   </div>
 </div>
<div class="container tc-main "
 最火视频
	<div class="top10 clearboth" >
		
		<div class="left_side">
		<img src="/hiphoplife/tpl/simplebootx/Public/images/taisuke.png" alt="" width="300">
		<img src="/hiphoplife/tpl/simplebootx/Public/images/cloud.png" alt="" width="300">
		</div>
		<div class="content clearboth">
			<h1 id="top_title">Top 10</h1>
			<div class="rankbox">
				<div class="ranknum">1</div>
				<div class="rankcontent"></div>
			</div><div class="rankbox">
				<div class="ranknum">2</div>
				<div class="rankcontent"></div>
			</div><div class="rankbox">
				<div class="ranknum">3</div>
				<div class="rankcontent"></div>
			</div>

		</div>
		<div class="right_side">
			<img src="/hiphoplife/tpl/simplebootx/Public/images/hong10.png" alt="" width="300">
			<img src="/hiphoplife/tpl/simplebootx/Public/images/lilou.png" alt="" width="300">
		</div>
	</div>
<div id="container">
	<!-- 最火视频显示模块 -->
	<!-- <div class="best10">
		<?php $blist = sp_sql_posts_paged("cid:$cat_id;order:post_hits DESC;",10); $bindex =1; ?>
		<?php if(is_array($blist['posts'])): $i = 0; $__LIST__ = $blist['posts'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div><a href="<?php echo leuu('Video/index',array('id'=>$vo['tid']));?>">这是最火视频<?php echo ($index); ?></a></div>
			<?php $bindex++; endforeach; endif; else: echo "" ;endif; ?>
	</div>
	
	最新视频显示模块
	<div class="new10">
		<?php $blist = sp_sql_posts_paged("cid:$cat_id;order:post_modified DESC;"); $nindex =1; ?>
		<?php if(is_array($blist['posts'])): $i = 0; $__LIST__ = $blist['posts'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div><a href="<?php echo leuu('Video/index',array('id'=>$vo['tid']));?>">这是新视频<?php echo ($nindex); ?></a></div>
			<?php $nindex++; endforeach; endif; else: echo "" ;endif; ?>
	</div> -->


		<!-- 展示框 -->
 <div class="showcase">
		<div class="showbox">
			<?php $alist = sp_sql_posts("cid:$cat_id;limit:0,2;order:post_modified DESC;"); $nindex =1; ?>
			<?php if(is_array($alist)): $i = 0; $__LIST__ = $alist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div><a href="<?php echo leuu('Video/index',array('id'=>$vo['tid']));?>">这是新视频<?php echo ($vo['tid']); ?></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
		<div class="new"></div>
		<input type="button" value="加载更多" class="addmore">
	</div>

</div>

</div>
	<div class="hip_footer_box">
			<div class="range">
				<ul class="footer_contant clearfix">
					<li>
						<div class="erwei"><img src="/hiphoplife/tpl/simplebootx/Public/images/erwei.jpg" width="100" height="100" alt="">
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
							<li><a href="">街舞爱好者论坛</a></li>
							<li><a href="">嘻哈网</a></li>
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
<script>
	var showindex = 0;
	var showbox = $('.showbox');
	
	$(function(){	
	 	if(!showbox.is(':empty')){
			showindex=2;
		 }		
	});
	/* 解析json数据 */
	function toJson(str){
		var json = eval('('+str+')');
		return json;
	} 	
	$(".addmore").bind('click',function(){
		$.ajax({
			type:'post',
			url:'VideoSort/add/id/<?php echo ($cat_id); ?>',
			data:{showindex:showindex},
			success:function(re){
				var data = toJson(re);
				for(var i = 0;i<data.length;i++){
					var tid = data[i].tid;
					var str ='<div><a href="Video/index/id/'+tid+'">视频'+data[i].tid+'</a></div>';
					showbox.append(str);
				}
				showindex+=2;
			}
		});
	});
</script> 
</html>