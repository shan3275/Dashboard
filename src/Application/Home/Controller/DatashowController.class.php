<?php
namespace Home\Controller;

class DatashowController extends BaseController {
	function activity(){
		$this->display();
	}

	function ad(){
		$day = M('day');
		$week = M('week');
		$gath = M('gath');
		$gather = $gath->select();
		
		if($_GET['num'] == 1){
			$demo = array();
			$time = $day->where(array('gid'=>'1'))->order('date desc')->getField('date',true);
			foreach($time as $val){
				$tmp = $day->where(array('date' => $val))->select();
				foreach($tmp as $v){
					$demo[$val][$v['gid']] = $v;
					$demo[$val]['aim'] += $v['aim'];
					$demo[$val]['reality'] += $v['reality'];
				}
			}

			$data['list'] = $demo;
		}elseif($_GET['num'] == 2){
			$listw = array();
			$weekday = $week->where(array('gid' => '1'))->order('monday asc')->getField('monday,sunday',true);
			foreach($weekday as $key => $val){
				$k = $key."~".$val;
				$tmp = $week->where(array('monday' => $key))->select();
				foreach($tmp as $v){
					
					$listw[$k]['aim'] += $v['aim'];
					$listw[$k]['reality'] += $v['reality'];
					$listw[$k][$v['gid']] = $v;

				}
				
			}
			
			$data['listw'] = $listw;
		}
		$data['gather'] = $gather;
		$data['num'] = $_GET['num'];
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
		

		$week = M('week');
		$gath = M('gath');
		$data = array();
		$gather = $gath->select();
		foreach($gather as $key => $val){
			$demo = $week->where(array('gid'=>$val['id']))->select();
			
			foreach($demo as $k => $v){
				$data[$key*2][$k] = $v['aim'];
				$data[$key*2+1][$k] = $v['reality'];
				$legend[$k] = $v['monday'].'~'.$v['sunday'].' ';
			}
			$name[$key*2] = $val['name'].'目标';
			$name[$key*2+1] = $val['name'].'收益';
		}
		
		$title = "业务周收益"; //标题
		
		$size = 140; //尺寸
		$width = 950; //宽度
		$height = 350; //高度
		$chart->createcolumnar2($title,$data,$name,$size,$height,$width,$legend);
	}

}