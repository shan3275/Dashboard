<?php
function arraySort($arr,$pid=0){
	$list=array();
	foreach($arr as $key => $v){
		if($v['p_id']==$pid){
			$tmp = arraySort($arr,$v['id']);
			if($tmp){
				$v['submenu'] = $tmp;
			}
			$list[]=$v;
		}
	}
	return $list;
}

function todayclick($type,$url){
	$morning = strtotime(date('Y-m-d 00:00:00'));
	$night = strtotime(date('Y-m-d 23:59:59'));
	$time['create_time'] = array('between',$morning.','.$night);
	$time['new_time'] = array('between',$morning.','.$night);
	$time['_logic'] = 'or';
	$where['_complex'] = $time;
	$where['type'] = $type;
	$where['fromtype'] = 'click';
	$where['fromurl'] = $url;
	return M('ad')->where($where)->count();
}

function newtimeshow($type,$url){
	$where['type'] = $type;
	$where['fromtype'] = 'show';
	$where['fromurl'] = $url;
	$time = M('ad')->field('max(create_time) as mct,max(new_time) as mnt')->where($where)->find();
	$time = !$time['mnt'] ? $time['mct'] : $time['mnt'];
	return date("Y-m-d H:i:s",$time);
}

function adtoday($conid){
	$morning = strtotime(date('Y-m-d 00:00:00'));
	$night = strtotime(date('Y-m-d 23:59:59'));
	$time['create_time'] = array('between',$morning.','.$night);
	$time['new_time'] = array('between',$morning.','.$night);
	$time['_logic'] = 'or';
	$where['_complex'] = $time;
	$where['conid'] = $conid;
	$where['fromtype'] = 'click';
	return M('ad')->where($where)->count();
}

function getclass($cid){
	return M('class')->where(array('id'=>$cid))->getField('name');
}

function getWeekRange($date, $start=1){

    // 将日期转时间戳
    $dt = new DateTime($date);
    $timestamp = $dt->format('U');

    // 获取日期是周几
    $da = new DateTime('@'.$timestamp);
    $day = $da->format('w');

    // 计算开始日期
    if($day>=$start){
        $startdate_timestamp = mktime(0,0,0,date('m',$timestamp),date('d',$timestamp)-($day-$start),date('Y',$timestamp));
    }elseif($day<$start){
        $startdate_timestamp = mktime(0,0,0,date('m',$timestamp),date('d',$timestamp)-7+$start-$day,date('Y',$timestamp));
    }

    // 结束日期=开始日期+6
    $enddate_timestamp = mktime(0,0,0,date('m',$startdate_timestamp),date('d',$startdate_timestamp)+6,date('Y',$startdate_timestamp));

    $startd = new DateTime('@'.$startdate_timestamp);
    $startdate = $startd->format('Y-m-d');
    $endtd = new DateTime('@'.$enddate_timestamp);
    $enddate = $endtd->format('Y-m-d');

    return array($startdate, $enddate);
}

function getPermis($name){
	$tmp = array();
	$tmp['aim'] = $name.'_aim';
	$tmp['reality'] = $name.'_reality';
	$tmp['name'] = $name;

	return $tmp;
}