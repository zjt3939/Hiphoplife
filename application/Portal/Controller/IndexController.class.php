<?php

namespace Portal\Controller;
use Common\Controller\HomeBaseController; 
/**
 * 首页
 */
class IndexController extends HomeBaseController {

	private $navModel;
	private $videoModel;
	private $imageModel;
	protected $commentModel;

	function _initialize(){
		parent::_initialize();
		$this->navModel = M('Nav');
		$this->videoModel = M('Video');
		$this->imageModel = M('Image');
		$this->commentModel = D('comments');
	}
    //首页
	public function index() {
		// 获取nav数据

		$navdata = $this->navModel->field('label,href')->where(['cid'=>1,'parentid'=>0,'status'=>1])->order('listorder asc')->select();
		// var_dump($navdata);
		$hotvideoData =$this->videoModel->order('hit desc')->limit(0,7)->select();
		$cwhere =[];
		foreach($hotvideoData as &$val){
			$cwhere['post_table'] = 'video';
			$cwhere['post_id'] = $val['id'];
			$Commentsum = $this->commentModel->where($cwhere)->count();
			$time = strtotime($val['create_time']);
			$val['commentsum'] = $Commentsum;
			$val['create_time'] = date('Y-m-d',$time);
			$val['smeta'] = sp_get_asset_upload_path($val['smeta']);
		}
		// var_dump($hotvideoData);
		$newvideodata = $this->videoModel->order('create_time desc')->limit(0,12)->select();
		foreach ($newvideodata as &$val) {
			$cwhere['post_table'] = 'video';
			$cwhere['post_id'] = $val['id'];
			$Commentsum = $this->commentModel->where($cwhere)->count();
			$time = strtotime($val['create_time']);
			$val['commentsum'] = $Commentsum;
			$val['create_time'] = date('Y-m-d',$time);
			$val['smeta'] = sp_get_asset_upload_path($val['smeta']);
		}

		// var_dump($newvideodata);
		$newImageData = $this->imageModel->order('create_time desc')->limit(0,10)->select();
		foreach($newImageData as &$val){
			$cwhere['post_table'] = 'Image';
			$cwhere['post_id'] = $val['id'];
			$Commentsum = $this->commentModel->where($cwhere)->count();
			$time = strtotime($val['create_time']);
			$val['commentsum'] = $Commentsum;
			$val['create_time'] = date('Y-m-d',$time);
			$val['smeta'] = sp_get_asset_upload_path($val['smeta']);
		}
		// var_dump($newImageData);
		$this->assign('newImageData',$newImageData);
		$this->assign('newvideodata',$newvideodata);
		$this->assign('hotvideoData',$hotvideoData);
		$this->assign('navData',$navdata);
    
    	// var_dump($_SESSION ["user"]);
    	$this->display(":index");
    }

}


