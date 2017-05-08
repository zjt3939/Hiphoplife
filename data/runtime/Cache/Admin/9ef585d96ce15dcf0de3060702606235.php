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
<div class="wrap J_check_wrap">
  <ul class="nav nav-tabs">
     <li><a href="<?php echo U('rbac/index');?>">角色管理</a></li>
     <li><a href="<?php echo U('rbac/roleadd');?>">添加角色</a></li>
  </ul>
  <form class="form-horizontal J_ajaxForm" action="<?php echo U('Rbac/roleedit_post');?>" method="post" id="myform">
    <div class="table_full">
      <table width="100%" cellpadding="2" cellspacing="2">
        <tr>
          <th width="180">角色名称</th>
          <td><input type="text" name="name" value="<?php echo ($data["name"]); ?>" class="input" id="rolename"><span class="must_red">*</span></td>
        </tr>
        <tr>
          <th>角色描述</th>
          <td><textarea name="remark" rows="2" cols="20" id="remark" class="inputtext" style="height:100px;width:500px;"><?php echo ($data["remark"]); ?></textarea></td>
        </tr>
        <tr>
          <th>是否启用</th>
          <td>
          	<?php $active_true_checked=($data['status'] ==1)?"checked":""; ?>
              <label class="radio inline" for="active_true">
            		<input type="radio" name="status" value="1" <?php echo ($active_true_checked); ?> id="active_true"/>开启
            </label>
            <?php $active_false_checked=($data['status'] ==0)?"checked":""; ?>
            <label class="radio inline" for="active_false">
            		<input type="radio" name="status" value="0" id="active_false" <?php echo ($active_false_checked); ?>>禁止
            </label>
          </td>
        </tr>
      </table>
      <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>" />
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary btn_submit  J_ajax_submit_btn">提交</button>
        <a class="btn" href="/hiphoplife/index.php/Admin/Rbac">返回</a>
    </div>
  </form>
</div>
<script src="/hiphoplife/statics/js/common.js"></script>
</body>
</html>