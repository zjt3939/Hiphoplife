<?php
namespace Portal\Controller;
use Common\Controller\HomeBaseController;
/*
*视频分类显示控制器，根据接受到的term_id来显示不同的分类的视频
*/

class VideoSortController extends HomeBaseController{

	//分类视频的显示页
	public function index(){
		$term = sp_get_term($_GET['id']);
		$tplname = $term['list_tpl'];
		$tplname = sp_get_apphome_tpl($tplname, "videosort");//获取到模板地址
		$this->assign($term);
    	$this->assign('cat_id', intval($_GET['id']));
    	$this->display(":$tplname");//渲染指定的模板
	}

	public function add(){
		$termid = $_GET['id'];
		$showindex = $_POST['showindex'];
		$alist = sp_sql_posts("cid:$termid;limit:$showindex,2;order:post_modified DESC;");
		$alistjson = json_encode($alist);
		echo($alistjson);

		
	}


}