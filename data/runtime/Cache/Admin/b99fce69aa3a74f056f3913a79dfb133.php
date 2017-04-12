<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh_CN" style="overflow: hidden;">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- Set render engine for 360 browser -->
<meta name="renderer" content="webkit">
<meta charset="utf-8">
<title>Hiphoplife后台管理</title>

<meta name="description" content="This is page-header (.page-header &gt; h1)">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="/hiphoplife/statics/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
<link href="/hiphoplife/statics/simpleboot/css/simplebootadmin.css" rel="stylesheet">
<link href="/hiphoplife/statics/simpleboot/font-awesome/4.2.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
<!--[if IE 7]>
	<link rel="stylesheet" href="/hiphoplife/statics/simpleboot/font-awesome/4.2.0/css/font-awesome-ie7.min.css">
<![endif]-->
<link rel="stylesheet" href="/hiphoplife/statics/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/simplebootadminindex.min.css?">
<!--[if lte IE 8]>
	<link rel="stylesheet" href="/hiphoplife/statics/simpleboot/css/simplebootadminindex-ie.css?" />
<![endif]-->
<style>
.navbar .nav_shortcuts .btn{margin-top: 5px;}

/*-----------------导航hack--------------------*/
.nav-list>li.open{position: relative;}
.nav-list>li.open .back {display: none;}
.nav-list>li.open .normal {display: inline-block !important;}
.nav-list>li.open a {padding-left: 7px;}
.nav-list>li .submenu>li>a {background: #fff;}
.nav-list>li .submenu>li a>[class*="fa-"]:first-child{left:20px;}
.nav-list>li ul.submenu ul.submenu>li a>[class*="fa-"]:first-child{left:30px;}
/*----------------导航hack--------------------*/
</style>

<script>
//全局变量
var GV = {
	HOST:"<?php echo ($_SERVER['HTTP_HOST']); ?>",
    DIMAUB: "/hiphoplife/",
    JS_ROOT: "statics/js/",
    TOKEN: ""
};
</script>
<?php $submenus=(array)json_decode($SUBMENU_CONFIG); ?>

<?php function getsubmenu($submenus){ ?>
<?php foreach($submenus as $menu){ ?>
					<li>
						<?php if(empty($menu->items)){ ?>
							<a href="javascript:openapp('<?php echo ($menu->url); ?>','<?php echo ($menu->id); ?>','<?php echo ($menu->name); ?>');">
								<i class="fa fa-<?php echo ((isset($menu->icon) && ($menu->icon !== ""))?($menu->icon):'desktop'); ?>"></i>
								<span class="menu-text"><?php echo ($menu->name); ?></span>
							</a>
						<?php }else{ ?>
							<a href="#" class="dropdown-toggle">
								<i class="fa fa-<?php echo ((isset($menu->icon) && ($menu->icon !== ""))?($menu->icon):'desktop'); ?> normal"></i>
								<span class="menu-text normal"><?php echo ($menu->name); ?></span>
								<b class="arrow fa fa-angle-right normal"></b>
								<i class="fa fa-reply back"></i>
								<span class="menu-text back">返回</span>

							</a>

							<ul  class="submenu">
									<?php getsubmenu1((array)$menu->items) ?>
							</ul>
						<?php } ?>

					</li>

				<?php } ?>
<?php } ?>

<?php function getsubmenu1($submenus){ ?>
<?php foreach($submenus as $menu){ ?>
					<li>
						<?php if(empty($menu->items)){ ?>
							<a href="javascript:openapp('<?php echo ($menu->url); ?>','<?php echo ($menu->id); ?>','<?php echo ($menu->name); ?>');">
								<i class="fa fa-caret-right"></i>
								<span class="menu-text"><?php echo ($menu->name); ?></span>
							</a>
						<?php }else{ ?>
							<a href="#" class="dropdown-toggle">
								<i class="fa fa-caret-right"></i>
								<span class="menu-text"><?php echo ($menu->name); ?></span>
								<b class="arrow fa fa-angle-right"></b>
							</a>
							<ul  class="submenu">
									<?php getsubmenu2((array)$menu->items) ?>
							</ul>
						<?php } ?>
						
					</li>
					
				<?php } ?>
<?php } ?>

<?php function getsubmenu2($submenus){ ?>
<?php foreach($submenus as $menu){ ?>
					<li>
						<a href="javascript:openapp('<?php echo ($menu->url); ?>','<?php echo ($menu->id); ?>','<?php echo ($menu->name); ?>');">
								&nbsp;<i class="fa fa-angle-double-right"></i>
								<span class="menu-text"><?php echo ($menu->name); ?></span>
							</a>
					</li>
					
				<?php } ?>
<?php } ?>


<?php if(APP_DEBUG): ?><style>
#think_page_trace_open{left: 0 !important;
right: initial !important;}			
</style><?php endif; ?>

</head>

<body style="min-width:900px;" screen_capture_injected="true">
	<div id="loading"><i class="loadingicon"></i><span>正在加载...</span></div>
	<div id="right_tools_wrapper">
		<!--<span id="right_tools_clearcache" title="清除缓存" onclick="javascript:openapp('<?php echo U('admin/setting/clearcache');?>','right_tool_clearcache','清除缓存');"><i class="fa fa-trash-o right_tool_icon"></i></span>-->
		<span id="refresh_wrapper" title="刷新当前页" ><i class="fa fa-refresh right_tool_icon"></i></span>
	</div>
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a href="/hiphoplife/index.php?g=admin&m=index&a=index" class="brand"> <small> 
				<img src="/hiphoplife/statics/images/icon/logo-18.png">
						Hiphoplife 后台
				</small>
				</a>
				<div class="pull-left nav_shortcuts" >
					
					<a class="btn btn-small btn-warning" href="/hiphoplife/" title="前台首页" target="_blank">
						<i class="fa fa-home"></i>
					</a>
					
					<?php if(sp_auth_check(sp_get_current_admin_id(),'portal/AdminTerm/index')): ?><a class="btn btn-small btn-success" href="javascript:openapp('<?php echo U('portal/AdminTerm/index');?>','index_termlist','分类管理');" title="分类管理">
						<i class="fa fa-th"></i>
					</a>
					<if condition="sp_auth_check(sp_get_current_admin_id(),'Content/AdminVideoManage/index')">
					<a class="btn btn-small btn-info" href="javascript:openapp('<?php echo U('content/AdminVideoManage/index');?>','index_video','视频管理');" title="视频管理">
						<i class="fa fa-film"></i>
					</a><?php endif; ?>
					<?php if(sp_auth_check(sp_get_current_admin_id(),'Content/AdminMusicManage/index')): ?><a class="btn btn-small btn-info" href="javascript:openapp('<?php echo U('content/AdminMusicManage/index');?>','index_music','音乐管理');" title="音乐管理">
						<i class="fa fa-music"></i>
					</a><?php endif; ?>
					<?php if(sp_auth_check(sp_get_current_admin_id(),'portal/AdminPost/index')): ?><a class="btn btn-small btn-info" href="javascript:openapp('<?php echo U('portal/AdminPost/index');?>','index_postlist','文章管理');" title="文章管理">
						<i class="fa fa-pencil"></i>
					</a><?php endif; ?>

					<?php if(sp_auth_check(sp_get_current_admin_id(),'admin/setting/clearcache')): ?><a class="btn btn-small btn-danger" href="javascript:openapp('<?php echo U('admin/setting/clearcache');?>','index_clearcache','清除缓存');" title="清除缓存">
						<i class="fa fa-trash-o"></i>
					</a><?php endif; ?>
				</div>
				<ul class="nav simplewind-nav pull-right">
					<li class="light-blue">
						<a data-toggle="dropdown" href="#" class="dropdown-toggle">
							<img class="nav-user-photo" src="/hiphoplife/statics/images/icon/logo-18.png" alt="<?php echo ($admin["user_login"]); ?>">
							<span class="user-info">
								<small>欢迎,</small><?php echo ((isset($admin["user_nicename"]) && ($admin["user_nicename"] !== ""))?($admin["user_nicename"]):$admin[user_login]); ?>
							</span>
							<i class="fa fa-caret-down"></i>
						</a>
						<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
							<?php if(sp_auth_check(sp_get_current_admin_id(),'admin/setting/site')): ?><li><a href="javascript:openapp('<?php echo U('setting/site');?>','index_site','站点管理');"><i class="fa fa-cog"></i> 站点管理</a></li><?php endif; ?>
							<?php if(sp_auth_check(sp_get_current_admin_id(),'admin/user/userinfo')): ?><li><a href="javascript:openapp('<?php echo U('user/userinfo');?>','index_userinfo','个人资料');"><i class="fa fa-user"></i> 个人资料</a></li><?php endif; ?>
							<li><a href="<?php echo U('Public/logout');?>"><i class="fa fa-sign-out"></i> 退出</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="main-container container-fluid">

		<div class="sidebar" id="sidebar">
			<!-- <div class="sidebar-shortcuts" id="sidebar-shortcuts">
			</div> -->
			<div id="nav_wraper">
			<ul class="nav nav-list">
				<?php echo getsubmenu($submenus);?>
			</ul>
			</div>
			
		</div>

		<div class="main-content">
			<div class="breadcrumbs" id="breadcrumbs">
				<a id="task-pre" class="task-changebt">←</a>
				<div id="task-content">
				<ul class="macro-component-tab" id="task-content-inner">
					<li class="macro-component-tabitem noclose" app-id="0" app-url="<?php echo U('main/index');?>" app-name="首页">
						<span class="macro-tabs-item-text">首页</span>
					</li>
				</ul>
				<div style="clear:both;"></div>
				</div>
				<a id="task-next" class="task-changebt">→</a>
			</div>
			<div class="page-content" id="content">
				<iframe src="<?php echo U('Main/index');?>" style="width:100%;height: 100%;" frameborder="0" id="appiframe-0" class="appiframe"></iframe>
			</div>
		</div>
	</div>
	
	<script src="/hiphoplife/statics/js/jquery.js"></script>
	<script src="/hiphoplife/statics/simpleboot/bootstrap/js/bootstrap.min.js"></script>
	<script>
	var ismenumin = $("#sidebar").hasClass("menu-min");
	$(".nav-list").on( "click",function(event) {
		var closest_a = $(event.target).closest("a");
		if (!closest_a || closest_a.length == 0) {
			return
		}
		if (!closest_a.hasClass("dropdown-toggle")) {
			if (ismenumin && "click" == "tap" && closest_a.get(0).parentNode.parentNode == this) {
				var closest_a_menu_text = closest_a.find(".menu-text").get(0);
				if (event.target != closest_a_menu_text && !$.contains(closest_a_menu_text, event.target)) {
					return false
				}
			}
			return
		}
		var closest_a_next = closest_a.next().get(0);
		if (!$(closest_a_next).is(":visible")) {
			var closest_ul = $(closest_a_next.parentNode).closest("ul");
			if (ismenumin && closest_ul.hasClass("nav-list")) {
				return
			}
			closest_ul.find("> .open > .submenu").each(function() {
						if (this != closest_a_next && !$(this.parentNode).hasClass("active")) {
							$(this).slideUp(150).parent().removeClass("open")
						}
			});
		}
		if (ismenumin && $(closest_a_next.parentNode.parentNode).hasClass("nav-list")) {
			return false;
		}
		$(closest_a_next).slideToggle(150).parent().toggleClass("open");
		return false;
	});
	</script>
	<script src="/hiphoplife/tpl_admin/simpleboot/assets/js/index.js"></script>





</body>
</html>