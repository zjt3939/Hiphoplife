<?php
namespace Content\Controller;
use Common\Controller\HomeBaseController; 
class VideoController extends HomeBaseController {
	
		protected $videoModel;
		protected $userModel;
		protected $videoCategoryModel;
		protected $videoGatherModel;
		protected $navModel;
		protected $commentModel;
		protected $postsModel;
		// private $commentModel;


		function _initialize(){
			parent::_initialize();
			$this->videoModel =D("Common/Video");
			$this->userModel = M("Users");
			$this->videoCategoryModel = D("Common/VideoCategory");
			$this->videoGatherModel = M("videoGather");
			$this->navModel = M("nav");
			$this->commentModel = M('Comments');
			$this->postsModel = D("Common/Posts");
		}
	//(视频播放页面)---------------------------------------------
	public function detailone(){
		$id = intval(I('param.id'));
		$countresult = $this->videoModel->where(['Id'=>$id])->setInc('hit');
		$videoDetailData = $this->videoModel->where(['Id'=>$id])->select()[0];
		// var_dump($videoDetailData);

		$this->assign("videoDetailData",$videoDetailData);
      	
		$this->display();
	}
	//-----------------------------------------------------------



	//默认打开（全部）页面------------------------------------------
	public function strDance(){
		$p = 1;
		!empty(I('param.p'))&& $p=I('param.p');
		//根据类型筛选出街舞视频
		$strwhere = [];
		$VideoCategoryArr = $this->videoCategoryModel->field('category_id')->where(['type'=>'str'])->select();
		$VideoCategoryA = [];
		$hindex = 0;
		foreach($VideoCategoryArr as $val){
			$VideoCategoryA[$hindex] = $val['category_id'];
			$hindex++;
		}
		$strwhere['category_id'] = ['IN',$VideoCategoryA ];
		$count =$this->videoModel->where($strwhere)->count();
		$strAllData=$this->videoModel->where($strwhere)->order("create_time desc")->page($p.',12')->select();
		$page =$this->Page($count,12);
		// var_dump($strAllData);
		foreach($strAllData as &$val){
			$val['smeta'] = sp_get_asset_upload_path($val['smeta']);
		}
		$this->getHotStrdata();
		$this->assign("Page",$page->show('Admin'));
		// var_dump($page->show('Admin'));
		$this->assign("active","allData");
		$this->assign("videoData",$strAllData);
		$this->display();
	}
	//--------------------------------------------------------------



	//(全部文章)页面----------------------------------------------------
	public function strPost(){
		$p = 1;
		!empty(I('param.p'))&& $p=I('param.p');
		$postdata = $this->postsModel->where(['type'=>'str'])->order("post_modified desc")->page($p.",12")->select();
		$count = $this->postsModel->where(['type'=>'str'])->count();

		foreach($postdata as &$val){
			$val['smeta'] = json_decode($val['smeta'],true);
			$val['smeta']['thumb'] =sp_get_asset_upload_path($val['smeta']['thumb']);
		}
		// var_dump($postdata);
		$page =$this->Page($count,12);

		$this->getBestStrPost();
		$this->assign("postdata",$postdata);
		$this->assign("Page",$page->show('Admin'));
		$this->assign("active","allPostData");
		$this->display("strDance");
	}
	//--------------------------------------------------------------


	//街舞文章详细页-------------------------------------------------
	public function strPostDetail(){
		$id = I("param.id");
		// var_dump($id);
		$hit = $this->postsModel->where(['id'=>$id])->setInc('post_hits');
		$postData = $this->postsModel->where(['id'=>$id,'post_status'=>1])->select()[0];
		// var_dump($postData);
		$this->assign("postType",1);
		$this->assign("ArticleData",$postData);
		$this->display("Portal@:article");

	}




	//（赛事专辑）页面------------------------------------------------
	public function strGather(){
		$p = 1;
		!empty(I('param.p'))&& $p=I('param.p');
		$count =$this->videoGatherModel->where(['gather_id'=>['neq',1],'gather_status'=>1])->count();
		$strGatherData=$this->videoGatherModel->where(['gather_id'=>['neq',1],'gather_status'=>1])->order("create_time desc")->page($p.',12')->select();
		$page =$this->Page($count,12);
		foreach($strGatherData as &$val){
			if($val['image_type']==1){
				$val['smeta'] = sp_get_asset_upload_path($val['smeta']);
			}
			
		}

		$this->getHotStrdata();
		$this->assign("Page",$page->show('Admin'));
		$this->assign("active","gatherData");
		$this->assign("strGatherData",$strGatherData);
		$this->display("strDance");

	}
	//-----------------------------------------------------------------
	

	//显示单个专辑所有视频列表
	public function detailGather(){
		$p = 1;
		!empty(I('param.p'))&& $p=I('param.p');
		!empty(I('param.gather_id'))&& $gather_id = intval(I("param.gather_id"));
		$OneGatherData = $this->videoModel->where(['gather_id'=>$gather_id])->order("create_time desc")->page($p.',12')->select();
		$count= $this->videoModel->where(['gather_id'=>$gather_id])->count();
		$page =$this->Page($count,12);
		foreach($OneGatherData as &$val){
			$val['smeta'] = sp_get_asset_upload_path($val['smeta']);
		}

		$this->getHotStrdata();
		$this->assign("videoData",$OneGatherData);
		// var_dump($OneGatherData);
		$this->assign("Page",$page->show('Admin'));
		// var_dump($page->show('Admin'));
		$this->assign("active","gatherData");
		$this->display("strDance");
	}
	//--------------------------------------------------------------



	//（舞种选择）页面-----------------------------------------------
	function strCategory(){
		$p = 1;
		!empty(I('param.p'))&& $p=I('param.p');
		$count = $this->videoCategoryModel->where(['type'=>'str'])->count();
		$categoryData = $this->videoCategoryModel->where(['type'=>'str'])->page($p.",12")->select();
		$page =$this->Page($count,12);

		$this->getHotStrdata();
		$this->assign("Page",$page->show('Admin'));
		$this->assign("categoryData",$categoryData);
		$this->assign("active","categoryData");
		$this->display("strDance");
	}
	//-------------------------------------------------------------

	

	//指定舞种的所有视频--------------------------------------------
	function OneCategory(){
		$p = 1;
		!empty(I('param.p'))&& $p=I('param.p');
		$category_id = intval(I("param.category_id"));
		$OneCategoryData = $this->videoModel->where(['category_id'=>$category_id])->order("create_time desc")->page($p.",12")->select();
		$count = $this->videoModel->where(['category_id'=>$category_id])->count();
		$page =$this->Page($count,12);
		foreach($OneCategoryData as &$val){
			$val['smeta'] = sp_get_asset_upload_path($val['smeta']);
		}

		$this->getHotStrdata();
		$this->assign("videoData",$OneCategoryData);
		$this->assign("Page",$page->show('Admin'));
		$this->assign("active","categoryData");
		$this->display("strDance");

	}
	//------------------------------------------------------------





	//获取街舞视频Top9数据----------------------------------------
	private function getHotStrdata(){
		$strwhere = [];
		 //-----获取街舞视频点击率最高的九条的数据
		$VideoCategoryArr = $this->videoCategoryModel->field('category_id')->where(['type'=>'str'])->select();
		$VideoCategoryA = [];
		$hindex = 0;
		foreach($VideoCategoryArr as $val){
			$VideoCategoryA[$hindex] = $val['category_id'];
			$hindex++;
		}
		$strwhere['category_id'] = ['IN',$VideoCategoryA ];
		$HotStrData = $this->videoModel->field('name,Id')->where($strwhere)->order('hit desc')->limit(0,9)->select();
		//-----

		$this->assign('HotStrData',$HotStrData);
		$this->assign('htitle',"街舞视频Top9");
	}
	//-----------------------------------------------------------




	//获取街舞文章Top---------------------------------------------
	private function getBestStrPost(){
		$BestStrPostData = $this->postsModel->field("id,post_title")->where(['type'=>'str'])->order("post_hits desc")->limit(0,9)->select();
		$this->assign("BestStrPostData",$BestStrPostData);
		$this->assign('htitle',"街舞文章Top9");
	}


}
	