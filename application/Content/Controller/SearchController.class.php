<?php
namespace Content\Controller;
use Common\Controller\HomeBaseController; 
class SearchController extends HomeBaseController{
	protected $navModel ;
	protected $imageModel;
	protected $videoModel;
	protected $postsModel;
	protected $videoGatherModel;

	function _initialize(){
		parent::_initialize();

		$this->navModel = D("nav");
		$this->imageModel = D("Common/Image");
		$this->videoModel = D("Common/Video");
		$this->postsModel = D("Common/Posts");
		$this->videoGatherModel = D("Common/VideoGather");

	}

	/*
	从四张表中搜索的数据，因为表单字段相似，所以为了区分数据应该声明一个字段来区分
	从
	
	*/

	public function index(){
		// var_dump($keywords);
		// var_dump($keywords);

		if(!empty(I('param.keywords'))){
			$keywords=I('param.keywords');
			$p = 1;
			!empty(I('param.p'))&&$p = I('param.p');
			
			// $sum = 10;
			// 做减法运算
			// 获取专辑数据
			$gatherwhere = [];
			$gatherwhere['keywords'] =['like','%'.$keywords.'%'];
			$gatherCount =  $this->videoGatherModel->where($gatherwhere)->count();
			$gatherData = $this->videoGatherModel->where($gatherwhere)->order("create_time desc")->page($p.",3")->select();
			$gatherDataLength = count($gatherData);
			// echo $gatherDataLength;
			// $gatherAssignData =[];
			$assignData = [];
			foreach($gatherData as $key=>$val){
				$assignData[$key]['id']=$val['gather_id'];
				$assignData[$key]['content'] = $val['detail'];
				$assignData[$key]['title']=$val['gather_name'];
				$assignData[$key]['icon']='urlIconGather';
				$assignData[$key]['time'] = $val['create_time'];
				$assignData[$key]['url']=U('Content/Video/detailGather',['gather_id'=>$val['gather_id']]);
			}
			$gatherData =NUll;
			// var_dump($gatherAssignData);
			


			

			//获取视频数据
			$videowhere =[];
			$videowhere['keywords'] = ['like','%'.$keywords.'%'];
			$videoCount = $this->videoModel->where($videowhere)->count();
			if(empty($gatherData)){
				$videoData = $this->videoModel->where($videowhere)->order('hit desc')->page($p.",6")->select();
			}else{
				$videoData = $this->videoModel->where($videowhere)->order('hit desc')->page($p.",3")->select();
			}
			
			$videoDataCount = count($videoData)+$gatherCount;
			// $videoAssignData =[];
			foreach($videoData as $key=>$val){
				$assignData[$key+$gatherCount]['id'] = $val['id'];
				$assignData[$key+$gatherCount]['content'] = $val['detail'];
				$assignData[$key+$gatherCount]['title'] = $val['name'];
				$assignData[$key+$gatherCount]['time'] = $val['last_update_time'];
				$assignData[$key+$gatherCount]['icon'] ='urlIconVideo';
				$assignData[$key+$gatherCount]['url'] = U('Content/Video/detailone',['id'=>$val['id']]);
			}
			$videoData = NUll;
			// var_dump($videoAssignData);

			// posts表搜索筛选数据
			$postwhere = [];
			$postwhere['post_keywords'] = ['like','%'.$keywords.'%'];
			$postCount = $this->postsModel->where($postwhere)->count();
			if($videoDataCount<=3){
				
				$postData = $this->postsModel->where($postwhere)->order('post_hits desc')->page($p.",6")->select();
			}else{
				$postData = $this->postsModel->where($postwhere)->order('post_hits desc')->page($p.",3")->select();
			}
			
			$pageDataCount = count($postData)+$videoDataCount;
			// $postAssignData = [];
			foreach($postData as $key=>$val){
				$assignData[$key+$videoDataCount]['id'] = $val['id'];
				$assignData[$key+$videoDataCount]['content']= $val['post_excerpt'];
				$assignData[$key+$videoDataCount]['title']= $val['post_title'];
				$assignData[$key+$videoDataCount]['time']= $val['post_modified'];
				$assignData[$key+$videoDataCount]['icon']= 'urlIconPage';
				if($val['type']=='str'){
					$assignData[$key+$videoDataCount]['url']= U('Content/Video/strPostDetail',['id'=>$val['id']]);
				}else{
					$assignData[$key+$videoDataCount]['url']= U('Portal/Article/index',['id'=>$val['id']]);
				}
				

			}
			$postData = NUll;
			// var_dump($postAssignData);

			// image表搜索筛选条件
			$imgwhere = [];
			$imgwhere['keywords'] = ['like','%'.$keywords.'%'];
			$imgCount = $this->imageModel->where($imgwhere)->count();
			if($pageDataCount<=6){
					$imgData = $this->imageModel->where($imgwhere)->order("hit desc")->page($p.',6')->select();
			}else{
				$imgData = $this->imageModel->where($imgwhere)->order("hit desc")->page($p.',3')->select();
			}
			$imgData = $this->imageModel->where($imgwhere)->order("hit desc")->page($p.',3')->select();
			$imgDataCount = count($imgData)+$pageDataCount;
			// $imgAssignData = [];
			foreach($imgData as $key=>$val){
				$assignData[$key+$pageDataCount]['id']=$val['id'];
				$assignData[$key+$pageDataCount]['content']=$val['detail'];
				$assignData[$key+$pageDataCount]['title']=$val['name'];
				$assignData[$key+$pageDataCount]['time']=$val['last_update_time'];
				$assignData[$key+$pageDataCount]['icon']='urlIconScrawl';
				$assignData[$key+$pageDataCount]['url']=U('Content/Scrawl/detailone',['id'=>$val['id']]);
			}
			$imgData =NUll;
			$count =$gatherCount+$videoCount+$postCount+$imgCount;
			// echo $count;
			// var_dump($assignData);
			// echo $count;
			// var_dump($imgAssignData);
			$page =$this->page($count,12);
			$this->assign("Page",$page->show("Admin"));
			$this->assign("SearchData",$assignData);

			// echo $keywords;
		}else{
			// echo "11111";
			// echo $keywords;
		}

		$this->assign("keywords",I('param.keywords'));
		$this->assign("Search",true);
		$this->display("/Scrawl/index");

	}

}
