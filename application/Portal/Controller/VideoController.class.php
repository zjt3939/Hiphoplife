<?php
namespace Portal\Controller;
use Common\Controller\HomeBaseController;
/*
*视频播放控制页
*
*/
class VideoController extends HomeBaseController{


	//视播放页
	public function index(){
		$id = intval($_GET['id']);//获取term_relations中的tid
		$video = sp_sql_post($id,'');//获取对应的视频信息		
		$termid = $video['term_id'];
		$term_obj = M('Terms');
		$term = $term_obj->where("term_id='$termid'")->find();
		$video_id = $video['object_id'];
		//检查用户对某个url，内容的可访问性，如果可访问则返回true
// 		$should_change_post_hits = sp_check_user_action("posts$video_id",3,true);

// 		if($should_change_post_hits){
		//post_hits点击数加1
		$posts_model = M('Posts');
		$data = array("id"=>$video_id,"post_hits"=>array("exp","post_hits+1"));
		$posts_model->save($data);
// 		}
		$video['post_content'] =explode('_ueditor_page_break_tag_',$video['post_content'])[0];
		$this->assign($video);
		$this->display(":video");
		

	}


}		