<?php
namespace Home\Controller;

class ExadController extends BaseController {


	function index(){
		$gather = M('gather');

		
		$this->display();
	}

	

	function edit(){
		$ad = M('ex');
		$weekad = M('weekex');
		
		$week = getWeekRange(I('post.date'));
		$where['date'] = array('between',$week);

		if(IS_POST){

			$id = I('post.id');
			$tmp = array(
					'date' => I('post.date'),
					'ex_aim' => I('post.aim'),
					'ex_reality' => I('post.reality'),
					'explain' => I('post.explain'),
				);

			if($id){
				$select = $ad->where(array('id'=>$id))->find();
				if(I('post.date') != $select['date']){
					$this->error('日期不正确',U('edit',array('id'=>$id)));exit;
				}else{
					$ga_save = $ad->where(array('id'=>$id))->save($tmp);
					if($ga_save){

						$this->success('修改成功',U('edit'));
					}
				}
			}else{
				if(I('post.date') > date("Y-m-d")){
					$this->error('日期不正确',U('edit'));exit;
				}else{
					
					$lemt = $ad->where(array('date'=>I('post.date')))->find();
				
					if(isset($lemt)){
						$this->error('该日期的收益已存在,请输入新的日期收益',U('edit'));exit;
					}

					$ad_add = $ad->add($tmp);
					if($ad_add){
						$this->success('添加成功',U('edit'));
					}
				}
			}

			$list = $ad->where($where)->select();
			$demo = array();
			$demo['monday'] = $week[0];
			$demo['sunday'] = $week[1];
			foreach($list as $val){
				$demo['ex_aim'] += $val['ex_aim'];
				$demo['ex_reality'] += $val['ex_reality'];
			}
			$select_week = $weekad->where(array('monday' => $week[0]))->find();
			if($select_week){
				$weekad->where(array('monday' => $week[0]))->save($demo);
			}else{
				$weekad->add($demo);
			}
			exit;

		}
		
		$cid = $_GET['id'];
		if(isset($cid)){
			$show = $ad->where(array('id'=>$cid))->find();
			$data['show'] = $show;
		}
		$this->assign($data);
		$this->display();
	}



	function ad(){
		$day = M('ex');
		$weekad = M('weekex');
		if($_GET['num'] == 1){

			$advert = $day->order('date asc')->select();

			$data = array();
			$data['advert'] = $advert;
			
		}elseif($_GET['num'] == 2){

			$week = $weekad->select();
			
			$data['week'] = $week;
			
		}
			$data['num'] = $_GET['num'];
			$this->assign($data);
			$this->display();		
	}

	function drawXian(){
		import("ORG.Util.Chart");
		$chart = new \Org\Util\Chart();

		$day = M('ex');
		$advert = $day->order('date asc')->select();
		$data = array();
		$data2 = array();
		$legend = array();
		foreach($advert as $key => $val){
			$data[$key] = $val['ex_aim'];
			$data2[$key] = $val['ex_reality'];
			$legend[$key] = $val['date'].' ';
		}
		// dump($advert);exit;
		$title = "推广业务单日收益"; //标题
		
		$size = 140; //尺寸
		$width = 750; //宽度
		$height = 350; //高度
		
		$chart->createmonthline($title,$data,$data2,$size,$height,$width,$legend);
	}

	function drawZhu(){
		import("ORG.Util.Chart");
		$chart = new \Org\Util\Chart();
		$weekday = M('weekex');
		$week = $weekday->select();
		// dump($week);exit;
		foreach($week as $key => $val){
			$data1[$key] = $val['ex_aim'];
			$data2[$key] = $val['ex_reality'];
			$legend[$key] = $val['monday'].'~'.$val['sunday'].' ';
		}
		$data = array();
		$name = array();
		$data[] = $data1;
		$data[] = $data2;
		$name[] = '推广目标';
		$name[] = '推广收益';
		$title = "推广业务周收益"; //标题
		// dump($name);exit;
		$size = 140; //尺寸
		$width = 750; //宽度
		$height = 350; //高度
		$chart->createcolumnar2($title,$data,$name,$size,$height,$width,$legend);
	}

}