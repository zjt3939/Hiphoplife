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
			<li class="active"><a href="javascript:;">所有专辑</a></li>
			<li><a href="<?php echo U('AdminGatherManage/add',array('term'=>empty($term['term_id'])?'':$term['term_id']));?>" target="_self">添加专辑</a></li>
		</ul>
		<form class="J_ajaxForm" action="" method="post">
			<table class="table table-hover table-bordered table-list">
				<thead>
					<tr>
						<th>专辑名称</th>
						<th width="500">详细内容</th>
						<th>修改时间</th>
						<th>关键字</th>
						<th width="60px">状态</th>
						<th>操作</th>
					</tr>
				</thead>
				<?php $status=array("1"=>"已审核","0"=>"未审核"); $top_status=array("1"=>"已置顶","0"=>"未置顶"); $recommend_status=array("1"=>"已推荐","0"=>"未推荐"); ?>
				<?php if(is_array($gatherData)): foreach($gatherData as $key=>$do): ?><tr>
						<td><?php echo ($do['gather_name']); ?></td>
						<td width="500"><?php echo ($do['detail']); ?></td>
						<td><?php echo ($do['create_time']); ?></td>
						<td><?php echo ($do['keywords']); ?></td>
						<?php if($do['status']==1){ $do['status']='正常'; } ?>
						<td><?php echo ($do['status']); ?></td>
						<td>
						<a href="<?php echo U('AdminGatherManage/edit',array('gather_id'=>$do['gather_id']));?>">修改</a> | 
						<a href="<?php echo U('AdminGatherManage/delete',array('gather_id'=>$do['gather_id']));?>" class="J_ajax_del">删除</a></td>
				</tr><?php endforeach; endif; ?>
				<tfoot>
					<tr>
						<th>名称</th>
						<th width="500">详细内容</th>
						<th>修改时间</th>
						<th>关键字</th>
						<th width="60px">状态</th>
						<th>操作</th>
					</tr>
				</tfoot>
			</table>
			<div class="pagination"><?php echo ($Page); ?></div>

		</form>
	</div>
	<script src="/hiphoplife/statics/js/common.js"></script>
</body>
</html>