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
			<li class="active"><a href="javascript:;">所有视频</a></li>
			<li><a href="<?php echo U('AdminVideoManage/add',array('term'=>empty($term['term_id'])?'':$term['term_id']));?>" target="_self">添加视频</a></li>
		</ul>
		<form class="well form-search" method="post" action="<?php echo U('AdminVideoManage/index');?>">
			<div class="search_type cc mb10">
				<div class="mb10">
					<span class="mr20">视频类型：
						<select name="category_id" id="category_id">
							<option value=''>全部</option>
							<?php if(is_array($VideoCategory)): foreach($VideoCategory as $key=>$vo): if(!empty($selectData['category_id'])){ $selected = $vo['category_id']==$selectData['category_id']?'selected':''; } ?>
								<option value="<?php echo ($vo['category_id']); ?>" <?php echo ($selected); ?>><?php echo ($vo['category_name']); ?></option><?php endforeach; endif; ?>
						</select>&nbsp;&nbsp;
						专辑：
						<select name="gather_id" id="gather">
							<option value="">全部</option>
							<?php if(is_array($gatherData)): foreach($gatherData as $key=>$go): if(!empty($Selectedgather['gather_id'])){ $gselected = $Selectedgather['gather_id']==$go['gather_id']?"selected":''; } ?>
								<option value="<?php echo ($go['gather_id']); ?>" <?php echo ($gselected); ?>><?php echo ($go['gather_name']); ?></option><?php endforeach; endif; ?>
						</select>
						 &nbsp;&nbsp;
						时间：
						<input type="text" name="start_time" class="J_date" value="<?php echo ($selectData['start_time']); ?>" style="width: 80
						<input type="text" class="J_date" name="end_time" value="<?php echo ($selectData['endTime']); ?>" style="width: 80px;" autocomplete="off"> &nbsp; &nbsp;
						关键字：
						<input type="text" name="keywords" style="width: 200px;" value="<?php echo ($selectData['keywords']); ?>" placeholder="请输入关键字...">
						<input type="submit" class="btn btn-primary" value="搜索" />
					</span>
				</div>
			</div>
		</form>
		<form class="J_ajaxForm" action="" method="post">
			<table class="table table-hover table-bordered table-list">
				<thead>
					<tr>
						<th width="100px">名称</th>
						<th>详细内容</th>
						<th>url</th>
						<th>修改时间</th>
						<th>关键字</th>
						<th width="60px">类型</th>
						<th width="60px">专辑</th>
						<th width="60px">点击量</th>
						<th width="60px">状态</th>
						<th>操作</th>
					</tr>
				</thead>
				<?php $status=array("1"=>"已审核","0"=>"未审核"); $top_status=array("1"=>"已置顶","0"=>"未置顶"); $recommend_status=array("1"=>"已推荐","0"=>"未推荐"); ?>
				<?php if(is_array($VideoData)): foreach($VideoData as $key=>$do): ?><tr>
						<td width="100px" style="overflow: hidden;"><?php echo ($do['name']); ?></td>
						<td><?php echo ($do['detail']); ?></td>
						<td><?php echo ($do['url']); ?></td>
						<td><?php echo ($do['last_update_time']); ?></td>
						<td><?php echo ($do['keywords']); ?></td>
						<td><?php echo ($do['category_name']); ?></td>
						<td><?php echo ($do['gather_name']); ?></td>
						<td><?php echo ($do['hit']); ?></td>
						<?php if($do['status']==1){ $do['status']='正常'; } ?>
						<td><?php echo ($do['status']); ?></td>
						<td>
						<a href="<?php echo U('AdminVideoManage/edit',array('id'=>$do['id']));?>">修改</a> | 
						<a href="<?php echo U('AdminVideoManage/delete',array('id'=>$do['id']));?>" class="J_ajax_del">删除</a></td>
				</tr><?php endforeach; endif; ?>
				<tfoot>
					<tr>
						<th width="100px">名称</th>
						<th>详细内容</th>
						<th>url</th>
						<th>修改时间</th>
						<th>关键字</th>
						<th width="60px">类型</th>
						<th width="60px">专辑</th>
						<th width="60px">点击量</th>
						<th width="60px">状态</th>
						<th>操作</th>
					</tr>
				</tfoot>
			</table>
			<div class="pagination"><?php echo ($Page); ?></div>

		</form>
	</div>
	<script src="/hiphoplife/statics/js/common.js"></script>
	<script>
		$(function(){
			$('#category_id').on('change',function(){
				var category_id = $(this).val();
				$.post("<?php echo U('getGatherJoinCategory');?>",{id:category_id},function(data,status){
					var gatherChar = '<option value="">全部</option>';
					var i=0;
					for(i=0;i<data['Content'].length;i++){
						gatherChar+='<option value="'+data['Content'][i].gather_id+'">'+data['Content'][i].gather_name+'</option>';
					}
					$('#gather').html(" ").append(gatherChar);

				});
			});
		});
		function refersh_window() {
			var refersh_time = getCookie('refersh_time');
			if (refersh_time == 1) {
				window.location = "<?php echo U('AdminVideoManage/index',$formget);?>";
			}
		}
		setInterval(function() {
			refersh_window();
		}, 2000);
		$(function() {
			setCookie("refersh_time", 0);
			Wind.use('ajaxForm', 'artDialog', 'iframeTools', function() {
				//批量移动
				$('.J_articles_move').click(
						function(e) {
							var str = 0;
							var id = tag = '';
							$("input[name='ids[]']").each(function() {
								if ($(this).attr('checked')) {
									str = 1;
									id += tag + $(this).val();
									tag = ',';
								}
							});
							if (str == 0) {
								art.dialog.through({
									id : 'error',
									icon : 'error',
									content : '您没有勾选信息，无法进行操作！',
									cancelVal : '关闭',
									cancel : true
								});
								return false;
							}
						});
			});
		});
	</script>
</body>
</html>