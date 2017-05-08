<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Set render engine for 360 browser -->
	<meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

	<link href="/hiphoplife/statics/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="/hiphoplife/statics/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="/hiphoplife/statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/hiphoplife/statics/simpleboot/font-awesome/4.2.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		.length_3{width: 180px;}
		form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
		.table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
		.table-list{margin-bottom: 0px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/hiphoplife/statics/simpleboot/font-awesome/4.2.0/css/font-awesome-ie7.min.css">
	<![endif]-->
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
    <script src="/hiphoplife/statics/simpleboot/bootstrap/js/bootstrap.min.js"></script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
<body class="J_scroll_fixed">
	<div class="wrap jj">
		<ul class="nav nav-tabs">
			<li><a href="<?php echo U('menu/index');?>">后台菜单</a></li>
			<li><a href="<?php echo U('menu/add');?>">添加菜单</a></li>
		</ul>
		<div class="common-form">
			<form method="post" class="form-horizontal J_ajaxForm" action="<?php echo U('Menu/edit_post');?>">
				<fieldset>
					<div class="control-group">
						<label class="control-label">上级:</label>
						<div class="controls">
							<select name="parentid" class="normal_select">
								<option value="0">作为一级菜单</option> <?php echo ($select_categorys); ?>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">名称:</label>
						<div class="controls">
							<input type="text" class="input" name="name" value="<?php echo ($data["name"]); ?>">
							<span class="must_red">*</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">应用:</label>
						<div class="controls">
							<input type="text" class="input" name="app" id="app" value="<?php echo ($data["app"]); ?>">
							<span class="must_red">*</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">模块:</label>
						<div class="controls">
							<input type="text" class="input" name="model" id="model" value="<?php echo ($data["model"]); ?>">
							<span class="must_red">*</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">方法:</label>
						<div class="controls">
							<input type="text" class="input" name="action" id="action" value="<?php echo ($data["action"]); ?>">
							<span class="must_red">*</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">参数:</label>
						<div class="controls">
							<input type="text" class="input length_5" name="data" value="<?php echo ($data["data"]); ?>"> 例:id=3&amp;p=3
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">图标:</label>
						<div class="controls">
							<input type="text" class="input" name="icon" id="action" value="<?php echo ($data["icon"]); ?>">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">备注:</label>
						<div class="controls">
							<textarea name="remark" rows="5" cols="57"><?php echo ($data["remark"]); ?></textarea>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">状态:</label>
						<div class="controls">
							<select name="status" class="normal_select">
								<option value="1" name="data.status">显示</option>
								<?php $status_selected=empty($data['status'])?"selected":""; ?>
								<option value="0" name="data.status" <?php echo ($status_selected); ?>>隐藏</option>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">类型:</label>
						<div class="controls">
							<select name="type" class="normal_select">
								<option value="1" name="data.type">权限认证+菜单</option>
								<?php $type_selected=empty($data['type'])?"selected":""; ?>
								<option value="0" name="data.type" <?php echo ($type_selected); ?>>只作为菜单</option>
							</select>
							注意：“权限认证+菜单”表示加入后台权限管理，纯碎是菜单项请不要选择此项。
						</div>
					</div>
				</fieldset>

				<div class="form-actions">
					<input type="hidden" name="id" value="<?php echo ($data["id"]); ?>" />
					<button type="submit"
						class="btn btn-primary btn_submit  J_ajax_submit_btn">更新</button>
					<button class="btn J_ajax_close_btn" type="submit">关闭</button>
				</div>
			</form>
		</div>
	</div>
	<script src="/hiphoplife/statics/js/common.js"></script>
	<script>
		$(function() {
			$(".J_ajax_close_btn").on('click', function(e) {
				e.preventDefault();
				Wind.use("artDialog", function() {
					art.dialog({
						id : "question",
						icon : "question",
						fixed : true,
						lock : true,
						background : "#CCCCCC",
						opacity : 0,
						content : "您确定需要关闭当前页面嘛？",
						ok : function() {
							setCookie('refersh_time_admin_menu_index', 1);
							window.close();
							return true;
						}
					});
				});
			});
		});
	</script>
</body>
</html>