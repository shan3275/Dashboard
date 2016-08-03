<?php
namespace Home\Controller;

class AdvertController extends BaseController {

	function index(){
		$gather = getPermis('cn');
		dump($gather);
		
		$this->display();
	}


	function edit(){
		$day = M('day');
		$week = M('week');
		$gath = M('gath');

		if(IS_POST){
			$mon = getWeekRange(I('post.date'));
			$where['date'] = array('between',$mon);
			
			$id = I('post.id');
			$tmp = array(
					'date' 		=> I('post.date'),
					'aim' 		=> I('post.aim'),
					'reality'	=> I('post.reality'),
					'explain' 	=> I('post.explain'),
					'gid' 		=> I('post.gid')
				);

			
			$select = $day->where(array('id'=>$id))->find();

			if(I('post.date') != $select['date']){
				$this->error('日期不正确',U('edit',array('id'=>$id)));exit;
			}else{
				$day_save = $day->where(array('id'=>$id))->save($tmp);
				
				$this->success('修改成功',U('ad',array('gid' => I('post.gid'))));
				
			}
			
			$list = $day->where($where)->select();
			$demo = array();
			$demo['monday'] = $mon[0];
			$demo['sunday'] = $mon[1];
			$demo['gid'] = I("post.gid");
			foreach($list as $val){
				$demo['ad_aim'] += $val['ad_aim'];
				$demo['ad_reality'] += $val['ad_reality'];
			}
			$select_week = $week->where(array('monday' => $mon[0],'gid'=>I("post.gid")))->find();
			if($select_week){
				$week->where(array('id' => $select_week['id']))->save($demo);
			}else{
				$week->add($demo);
			}
			exit;

		}
		
		$gid = $_GET['gid'];
		$cid = $_GET['id'];
		if(isset($cid)){
			$show = $day->where(array('id'=>$cid))->find();
			$data['show'] = $show;
		}
		$this->gather = $gath->where(array('id'=>$gid))->find();

		$this->assign($data);
		$this->display();
	}

	function add(){
		$gid = $_GET['gid'];
		$gath = M('gath');
		$day = M('day');
		$week = M('week');

		$this->gather = $gath->where(array('id'=>$gid))->find();
		
		if(IS_POST){
			$tmp = array(
					'date' 		=> I('post.date'),
					'aim' 		=> I('post.aim'),
					'reality'	=> I('post.reality'),
					'explain' 	=> I('post.explain'),
					'gid' 		=> I('post.gid')
				);
			if(I('post.date') > date("Y-m-d")){
				$this->error('日期不正确',U('edit'));exit;
			}else{
				$lemt = $day->where(array('date'=>I('post.date'),'gid'=>I('post.gid')))->find();
				if(isset($lemt)){
					$this->error('该日期的收益已存在,请输入新的日期收益',U('edit',array('gid'=>I('post.gid'))));exit;
				}

				$day_add = $day->add($tmp);
				
				$this->success('添加成功',U('edit',array('gid'=>I('post.gid'))));
				
			}
			$mon = getWeekRange(I('post.date'));
			$where['date'] = array('between',$mon);
			$where['gid'] = array('eq',I('post.gid'));

			$list = $day->where($where)->select();
			dump($list);
			$demo = array();
			$demo['monday'] = $mon[0];
			$demo['sunday'] = $mon[1];
			$demo['gid'] = I("post.gid");
			foreach($list as $val){
				$demo['aim'] += $val['aim'];
				$demo['reality'] += $val['reality'];
			}
			$select_week = $week->where(array('monday' => $mon[0],'gid'=>I("post.gid")))->find();
			if($select_week){
				$week->where(array('id' => $select_week['id']))->save($demo);
			}else{
				$week->add($demo);
			}
			exit;

		}
		

		$this->display();
	}

	function ad(){
		$day = M('day');
		$week = M('week');
		$gid = $_GET['gid'];
		$num = isset($_GET['num'])?$_GET['num']:1;

		if($num == 1){

			$advert = $day->where(array('gid'=>$gid))->order('date desc')->select();

			$data = array();
			$data['advert'] = $advert;
			
		}elseif($num == 2){

			$week_list = $week->where(array('gid'=>$gid))->order('monday asc')->select();
			
			$data['week'] = $week_list;

		}
		$data['gid'] = $gid;
		$data['num'] = $num;
		$this->assign($data);
		$this->display();		
	}

	function drawXian(){
		import("ORG.Util.Chart");
		$chart = new \Org\Util\Chart();

		$day = M('day');
		$gid = $_GET['gid'];
		$gath = M('gath');
		$gather = $gath->where(array('id'=>$gid))->find();
		
		$advert = $day->where(array('gid'=>$gid))->order('date asc')->select();
		
		$data = array();
		$data2 = array();
		$legend = array();
		foreach($advert as $key => $val){
			
			$data[$key] = $val['aim'];
			$data2[$key] = $val['reality'];
			$legend[$key] = $val['date'].' ';
		}
		
		$title = $gather['name']."业务单日收益"; //标题
		
		$size = 140; //尺寸
		$width = 750; //宽度
		$height = 350; //高度
		
		$chart->createmonthline($title,$data,$data2,$size,$height,$width,$legend);
	}

	function drawZhu(){
		import("ORG.Util.Chart");
		$chart = new \Org\Util\Chart();
		$weekday = M('week');
		$gid = $_GET['gid'];
		$gath = M('gath');
		$gather = $gath->where(array('id'=>$gid))->find();

		$week = $weekday->where(array('gid'=>$gid))->order('monday asc')->select();
		// dump($week);exit;
		foreach($week as $key => $val){
			$data1[$key] = $val['aim'];
			$data2[$key] = $val['reality'];
			$legend[$key] = $val['monday'].'~'.$val['sunday'].' ';
		}
		$data = array();
		$name = array();
		$data[0] = $data1;
		$data[1] = $data2;
		$name[0] = $gather['name'].'目标';
		$name[1] = $gather['name'].'收益';
		$title = $gather['name']."业务周收益"; //标题
		// dump($name);exit;
		$size = 140; //尺寸
		$width = 750; //宽度
		$height = 350; //高度
		$chart->createcolumnar2($title,$data,$name,$size,$height,$width,$legend);
	}


}