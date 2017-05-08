<?php
namespace Content\Controller;
use Common\Controller\HomeBaseController;

class ReptileController extends HomeBaseController{

	function index(){
		// //采集某页面所有的图片
		// $data = QueryList::Query('http://jwjam.com/',array(
		//     'image' => array('img','src')
		//     ))->data;
		// //打印结果
		// var_dump($data);

		// $html ='http://jwjam.com/Jwjam/Article/article_album/';
		// $GatherArr = [];
		// $index = 1;


		// $data[0] = QueryList::Query($html,array(
		//         'img' => ['img.animate_pic','src'],
		//         'title' => ['span.bottom_box','html'],
		//         // 'Gatherurl' => ['#contentBox>a','href'],
		//         // 'GatherPageUrl'=>['#paging>a','href']
		// ))->getData(function($item){
		        
		//         return $item;
		// });
		// // var_dump($data);

		// $GatherPageArr = QueryList::Query('http://jwjam.com/Jwjam/Article/article_album',[
		//     'GatherPageUrl'=>['#paging>a','href']
		// ])->data;
		// // var_dump($GatherPageArr);
		// foreach($GatherPageArr as $val){
		//     $data[$index] =  QueryList::Query($val['GatherPageUrl'],[
		//         'img' => ['img.animate_pic','src'],
		//         'title' => ['span.bottom_box','html'],
		//         ])->data;
		//     $index++;
		// }
		var_dump(2);

	}
}
