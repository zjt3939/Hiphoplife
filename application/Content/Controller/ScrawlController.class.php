<?php
namespace Content\Controller;
use Common\Controller\HomeBaseController; 
class ScrawlController extends HomeBaseController {
	protected $navModel;
	protected $postsModel;
	protected $imageModel;
	protected $commentModel;
	protected $scrawlType;

	function _initialize(){
		parent::_initialize();
		$this->navModel =M("nav");
		$this->imageModel = D("Common/Image");
		$this->postsModel = D("Common/Posts");
		// echo "alert(".__FUNCTION__.")";

	}

	//涂鸦页面部分--------------------------------
	public function Scrawl(){
		//获取最新的作为文章报道
		$NewScrawPostlData =$this->postsModel->where(['type'=>'scrawl'])->order("post_date desc")->limit(0,10)->select();
		foreach($NewScrawPostlData as &$val){
			$val['smeta'] = json_decode($val['smeta'],true);
			$val['smeta']=sp_get_asset_upload_path($val['smeta']['thumb']);
		}
 
		//获取点击数量最高的作为热门作品
		$HitScrawlData= $this->imageModel->order("hit desc")->limit(0,10)->select();
		foreach($HitScrawlData as &$val){
			$val['smeta'] =sp_get_asset_upload_path($val['smeta']);
		}
		//获取点赞数量最高的作为精选作品
		$GoodScrawlData = $this->imageModel->order("image_like desc")->limit(0,10)->select();
		foreach($GoodScrawlData as &$val){
			$val['smeta'] =sp_get_asset_upload_path($val['smeta']);
		}

		//获去最最新数据作为最新作品
		$NewScrawlData = $this->imageModel->order("create_time desc")->limit(0,10)->select();
		foreach($NewScrawlData as &$val){
			$val['smeta'] =sp_get_asset_upload_path($val['smeta']);
		}

			
		// var_dump($NewScrawPostlData);
		// var_dump($HitScrawlData);
		// var_dump($GoodScrawlData);
		// var_dump($NewScrawlData);
		$this->scrawlType = 1;
		$this->assign("scrawlType",$this->scrawlType);
		$this->assign("NewScrawPostlData",$NewScrawPostlData);
		$this->assign("HitScrawlData",$HitScrawlData);
		$this->assign("GoodScrawlData",$GoodScrawlData);
		$this->assign("NewScrawlData",$NewScrawlData);
		
		$this->display('index');
	}

	public function detailone(){
		$id = I("param.id");
		$hit =$this->imageModel->where(['id'=>$id,'status'=>1])->setInc('hit');
		$Data  =$this->imageModel->where(['id'=>$id,'status'=>1])->select();
		// var_dump($Data);	
		$ArticleData = [];
		foreach($Data as &$val){
			$ArticleData['post_title'] = $val['name'];
			$ArticleData['post_author'] =$val['author'];
			$ArticleData['post_modified'] =$val['last_update_time'];
			$ArticleData['post_hits'] =$val['hit'];
			$ArticleData['post_content'] =$val['detail'];
			$ArticleData['imgurl'] =sp_get_asset_upload_path($val['smeta']);
		}
		$Data =null;
		// var_dump($ArticleData);
		$this->assign("ArticleData",$ArticleData);
		$this->assign("postType",2);
		$this->display("Portal@:article");
	}

	public function keepAdd(){

		$p = I("param.p");
		$scrawlType = I("param.scrawlType");
		if($scrawlType==1){
			$addScrawldata = $this->imageModel->order("create_time desc")->page($p.",10")->select();

		}elseif($scrawlType==2){

			$addScrawldata =$this->postsModel->where(['type'=>'scrawl'])->order("post_date desc")->page($p.",10")->select();
			foreach($addScrawldata as &$val){
				$val['smeta'] = json_decode($val['smeta'],true);
				$val['smeta']=sp_get_asset_upload_path($val['smeta']['thumb']);
			}
		}
		
		if(empty($addScrawldata)){
			$this->ajaxReturn([
			'status'=>0,
			'data'=>"已经到最后了"
			]);
		}else{
			foreach($addScrawldata as &$val){
				$val['smeta'] =sp_get_asset_upload_path($val['smeta']);
			}
			$this->ajaxReturn([
				'status'=>1,
				'data'=>$addScrawldata
				]);
		}

	}

	public function ScrawlPost(){
		
		$this->scrawlType = 2;
		//获取最新的作为文章报道
		$NewScrawPostlData =$this->postsModel->where(['type'=>'scrawl'])->order("post_date desc")->limit(0,10)->select();
		foreach($NewScrawPostlData as &$val){
			$val['smeta'] = json_decode($val['smeta'],true);
			$val['smeta']=sp_get_asset_upload_path($val['smeta']['thumb']);
		}

		$this->assign("NewScrawPostlData",$NewScrawPostlData);
		$this->assign("scrawlType",$this->scrawlType);
		$this->display('index');
	}

	//涂鸦模块结束------------------------------------------------------



	//Bbox模块部分-----------------------------------------------------
	public function Bbox(){
		
		//获取最新的Bbox资料
		$NewBboxPostlData =$this->postsModel->where(['type'=>'bbox'])->order("post_date desc")->limit(0,10)->select();
		foreach($NewBboxPostlData as &$val){
			$val['smeta'] = json_decode($val['smeta'],true);
			$val['smeta']=sp_get_asset_upload_path($val['smeta']['thumb']);
		}

		$this->assign("NewBboxPostlData",$NewBboxPostlData);
		
		$this->assign("Bbox",true);
		$this->display("index");
	}

	public function BboxKeepAdd(){
		$p = I("param.p");
		$addScrawldata =$this->postsModel->where(['type'=>'bbox'])->order("post_date desc")->page($p.",10")->select();
		foreach($addScrawldata as &$val){
			$val['smeta'] = json_decode($val['smeta'],true);
			$val['smeta']=sp_get_asset_upload_path($val['smeta']['thumb']);
		}
		if(empty($addScrawldata)){
			$this->ajaxReturn([
			'status'=>0,
			'data'=>"已经到最后了"
			]);
		}else{
			foreach($addScrawldata as &$val){
				$val['smeta'] =sp_get_asset_upload_path($val['smeta']);
			}
			$this->ajaxReturn([
				'status'=>1,
				'data'=>$addScrawldata
				]);
		}
	}



	//Bbox模块结束-----------------------------------------------------



	//Dj模块-----------------------------------------------------------

	public function Dj(){
		//获取最佳Dj
		$BestDjPostData = $this->postsModel->where(['type'=>'dj'])->order("post_like desc")->limit(0,10)->select();
		foreach($BestDjPostData as &$val){
			$val['smeta'] = json_decode($val['smeta'],true);
			$val['smeta']=sp_get_asset_upload_path($val['smeta']['thumb']);
		}

		//根据
		$NewDjPostlData =$this->postsModel->where(['type'=>'dj'])->order("post_hits desc")->limit(0,10)->select();
		foreach($NewDjPostlData as &$val){
			$val['smeta'] = json_decode($val['smeta'],true);
			$val['smeta']=sp_get_asset_upload_path($val['smeta']['thumb']);
		}

		$this->assign("NewDjPostlData",$NewDjPostlData);
		$this->assign("BestDjPostData",$BestDjPostData);
		
		$this->assign("Dj",true);
		$this->display("index");
	}

	public function DjKeepAdd(){
		$p = I("param.p");
		$addScrawldata =$this->postsModel->where(['type'=>'dj'])->order("post_hits desc")->page($p.",10")->select();
		foreach($addScrawldata as &$val){
			$val['smeta'] = json_decode($val['smeta'],true);
			$val['smeta']=sp_get_asset_upload_path($val['smeta']['thumb']);
		}
		if(empty($addScrawldata)){
			$this->ajaxReturn([
			'status'=>0,
			'data'=>"已经到最后了"
			]);
		}else{
			foreach($addScrawldata as &$val){
				$val['smeta'] =sp_get_asset_upload_path($val['smeta']);
			}
			$this->ajaxReturn([
				'status'=>1,
				'data'=>$addScrawldata
				]);
		}
	}
	//Dj模块结束-------------------------------------------------------




	//Mc模块---------------------------------------------------------
	public function Mc(){
		//获取最佳Mc数据
		$BestMcPostData = $this->postsModel->where(['type'=>'mc'])->order("post_like desc")->limit(0,10)->select();
		foreach($BestMcPostData as &$val){
			$val['smeta'] = json_decode($val['smeta'],true);
			$val['smeta']=sp_get_asset_upload_path($val['smeta']['thumb']);
		}


		//获取最新MC资料信息
		$NewMcPostlData =$this->postsModel->where(['type'=>'mc'])->order("post_hits desc")->limit(0,10)->select();
		foreach($NewMcPostlData as &$val){
			$val['smeta'] = json_decode($val['smeta'],true);
			$val['smeta']=sp_get_asset_upload_path($val['smeta']['thumb']);
		}

		$this->assign("BestMcPostData",$BestMcPostData);
		$this->assign("NewMcPostlData",$NewMcPostlData);
		
		$this->assign("Mc",true);
		$this->display("index");
	}

	public function McKeepAdd(){
		$p = I("param.p");
		$addScrawldata =$this->postsModel->where(['type'=>'mc'])->order("post_hits desc")->page($p.",10")->select();
		foreach($addScrawldata as &$val){
			$val['smeta'] = json_decode($val['smeta'],true);
			$val['smeta']=sp_get_asset_upload_path($val['smeta']['thumb']);
		}
		if(empty($addScrawldata)){
			$this->ajaxReturn([
			'status'=>0,
			'data'=>"已经到最后了"
			]);
		}else{
			foreach($addScrawldata as &$val){
				$val['smeta'] =sp_get_asset_upload_path($val['smeta']);
			}
			$this->ajaxReturn([
				'status'=>1,
				'data'=>$addScrawldata
				]);
		}
	}

	//MC模块结束-----------------------------------------------------



}
