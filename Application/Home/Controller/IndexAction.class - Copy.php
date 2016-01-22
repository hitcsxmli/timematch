<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
		if(strtoupper($_SERVER['REQUEST_METHOD'])=='GET'){
			if (isset($_GET['code'])){
				$user_model=M('user');
				$appid = "wx547fd502684dd565";  
				$secret = "df9554dea7444ac276e6d20ee285d2d0";  
				$code = $_GET["code"];
				//echo $code;
				if($_GET['state'] == 1){//默认点击
					//使用code获取access_token 和 openid 
					$oauth2Url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code";
					$oauth2 = $this->getJson($oauth2Url);
					$openid = $oauth2['openid'];
					//var_dump($oauth2);
					//根据openid获得refresh_token
					$ref_tk=$user_model->where("UserOpenid = '".$openid."'")->find();
					if($ref_tk['UserOpenid']){//数据库中存在该用户,需要判断是否过期
					/*//获取第二步的refresh_token后，请求以下链接获取access_token
						$get_access_token="https://api.weixin.qq.com/sns/oauth2/refresh_token?appid=$appid&grant_type=refresh_token&refresh_token=$ref_tk.UserRefreshToken";
						$ref_access_token=$this->getJson($get_access_token);
						var_dump($ref_access_token);  	*/
						//直接执行活动
					}
					else{//数据库中不存在该用户
						//echo "No User";
						header("location: https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=http%3a%2f%2f221.207.242.123%2ftimeMatching%2f&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect");
						
					}
				}
				else{//重定向,需要授权
					$oauth2Url_2 = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code";
					$oauth2_2 = $this->getJson($oauth2Url_2);
					$token_2 = $oauth2_2['access_token'];
					$openid_2 = $oauth2_2['openid'];
					//使用token 和openid获取用户信息
					$userUrl="https://api.weixin.qq.com/sns/userinfo?access_token=$token_2&openid=$openid_2&lang=zh_CN";
					$userInfo = $this->getJson($userUrl);
					$info='关注的用户名2：'.$userInfo['nickname'];
					//var_dump($userInfo);
					
					$data['UserOpenid']=$userInfo['openid'];
					$data['UserRefreshToken']=$oauth2_2['refresh_token'];
					$data['UserNickName']=$userInfo['nickname'];
					$data['UserCity']=$userInfo['city'];
					$data['UserSex']=$userInfo['sex'];
					$data['UserProvince']=$userInfo['province'];
					$data['UserCountry']=$userInfo['country'];
					$data['UserHeadImgUrl']=$userInfo['headimgurl'];
					$user_exist=$user_model->where("UserOpenid = '".$data['UserOpenid']."'")->find();
					
					if($user_exist['UserOpenid']){//更新用户信息
						$user_model->where('openid = '.$data['UserOpenid'])->save($data);
					}
					else{//增加用户
						$user_model->add($data);
					}
					
					echo "add success";
				}
				
				//判断获得的access_token 是否有效
				//$valid_info=$this->getJson("https://api.weixin.qq.com/sns/oauth2/refresh_token?appid=".$appid."&grant_type=refresh_token&refresh_token=".$ref_tk['UserRefreshToken']);
				//echo "https://api.weixin.qq.com/sns/oauth2/refresh_token?appid=".$appid."&grant_type=refresh_token&refresh_token=".$ref_tk['UserRefreshToken'];
				
				
						
			}
			/*else{//否则 将新授权以及重新授权的用户信息加入数据库
				
				//使用code获取access_token
				$oauth2Url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code";
				$oauth2 = $this->getJson($oauth2Url);
				$token = $oauth2['access_token'];
				$openid = $oauth2['openid'];
				//使用token 和openid获取用户信息
				$userUrl="https://api.weixin.qq.com/sns/userinfo?access_token=$token&openid=$openid&lang=zh_CN";
				$userInfo = $this->getJson($userUrl);
				$info='关注的用户名2：'.$userInfo['nickname'];
				//var_dump($userInfo);
				
				$data['UserOpenid']=$userInfo['openid'];
				$data['UserRefreshToken']=$oauth2['refresh_token'];
				$data['UserNickName']=$userInfo['nickname'];
				$data['UserCity']=$userInfo['city'];
				$data['UserSex']=$userInfo['sex'];
				$data['UserProvince']=$userInfo['province'];
				$data['UserCountry']=$userInfo['country'];
				$data['UserHeadImgUrl']=$userInfo['headimgurl'];
				$user_exist=$user_model->where("UserOpenid = '".$data['UserOpenid']."'")->find();
				echo $user_exist['UserOpenid'];
				if($user_exist['UserOpenid']){//更新用户信息
					$user_model->where('openid = '.$data['UserOpenid'])->save($data);
				}
				else{//增加用户
					$user_model->add($data);
				}
				
				//var_dump($oauth2);
				
			}*/
		}
		/*
		$activityModel=M('activity');
		if(strtoupper($_SERVER['REQUEST_METHOD'])=='POST' &&$_POST['flag_add'] == 'add'){
			$data['ActivityTitle']=$_POST['activity_name'];
			$data['ActivityPlace']=$_POST['activity_place'];
			$data['ActivityLeaderName']=$_POST['activity_leader'];
			$data['ActivityRemark']=$_POST['activity_remark'];
			$activityModel->add($data);
			echo "<script>alert('添加成功！');</script>";
		}
		if(strtoupper($_SERVER['REQUEST_METHOD'])=='POST' &&$_POST['flag_update'] == 'update'){
			$data2['ActivityTitle']=$_POST['activity_name_update'];
			$data2['ActivityPlace']=$_POST['activity_place_update'];
			$data2['ActivityLeaderName']=$_POST['activity_leader_update'];
			$data2['ActivityRemark']=$_POST['activity_remark_update'];
			$activityModel->where('ActivityId = '.$_POST['activity_id'])->save($data2);
			echo "<script>alert('修改成功！');</script>";
			
		}
		*/
		$activity_model=M('activity');
		$list=$activity_model->where("ActivityLeaderId = 'userId'")->order('ActivityId desc')->find();///////////////////////////////////////////////////
		$this->assign('info',$info);
		$this->assign('list',$list);
		$this->display();
		
	}
	public function getJson($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
		return json_decode($output, true);
	}
	public function test(){
		$this->display();
	}
	public function add_activity(){
		
		if(strtoupper($_SERVER['REQUEST_METHOD'])=='POST'){
			$activityModel=M('activity');
			$data['ActivityTitle']=$_POST['activity_name'];
			$data['ActivityPlace']=$_POST['activity_place'];
			$data['ActivityLeaderName']=$_POST['activity_leader'];
			$data['ActivityRemark']=$_POST['activity_remark'];
			$date_s=explode('/',$_POST['test_default']);
			$data['ActivityStartDate']=$date_s[2].'-'.$date_s[1].'-'.$date_s[0];
			$date_e=explode('/',$_POST['test_default_end']);
			$data['ActivityEndDate']=$date_e[2].'-'.$date_e[1].'-'.$date_e[0];
			//var_dump($data);
			//var_dump($_POST['test_default']));
		
			//echo $data['ActivityStartDate'];
			$activityModel->add($data);
			echo "<script>alert('添加成功！');window.location.href='../'</script>";
		}

		
	}
	public function update_activity(){
		if(strtoupper($_SERVER['REQUEST_METHOD'])=='POST'){
			$activityModel=M('activity');
			$data2['ActivityTitle']=$_POST['activity_name_update'];
			$data2['ActivityPlace']=$_POST['activity_place_update'];
			$data2['ActivityLeaderName']=$_POST['activity_leader_update'];
			$data2['ActivityRemark']=$_POST['activity_remark_update'];
			//$data2['ActivityStartDate']=date('Y-m-d',strtotime($_POST['test_default']));
			//$data2['ActivityEndDate']=date('Y-m-d',strtotime($_POST['test_default_end']));
			$activityModel->where('ActivityId = '.$_POST['activity_id'])->save($data2);
			//echo "<script>alert('修改成功');window.location.href='../'</script>";
			//$this->success('修改成功','../');
		}
	}
	public function participate(){
		if(strtoupper($_SERVER['REQUEST_METHOD'] == 'GET')){
			$activityModel=M('activity');
			$list=$activityModel->where('ActivityId = '.$_GET['activity_id'])->find();
			if(empty($list)){
				echo "<script>alert('无效的ID'); window.location.href='../../../'</script>";
			}
			$d1=strtotime($list['ActivityStartDate']);
			$d2=strtotime($list['ActivityEndDate']);
			$Days=round(($d2-$d1)/3600/24)+1;
			$all_days=array();
			
			$data['RecordActivityId']=$_GET['activity_id'];
			$data['RecordUserId']='test2';/////////////////////////////////////////////////////////
			$record_model=M('record');
			$a=$record_model->where($data)->select();
			if(!empty($a)){
				for($x=0;$x<$Days;$x++) {
					$all_days[$x]['date']=date('Y-m-d',strtotime("+".$x." day ".$list['ActivityStartDate']));
					$all_days[$x]['value']=$a[$x]['RecordDateStart'].','.$a[$x]['RecordDateEnd'];
					$all_days[$x]['record_id']=$a[$x]['RecordId'];
				}
			}
			else{
				for($x=0;$x<$Days;$x++) {
					$all_days[$x]['date']=date('Y-m-d',strtotime("+".$x." day ".$list['ActivityStartDate']));
				}
			}
			$this->assign('list',$list);
			$this->assign('AllDate',$all_days);
			$this->assign('Num_Date',$Days);
			//var_dump($all_days);
		}
		$this->display();

	}
	public function get_url(){
		echo "<script>alert('复制成功！')</script>";
	}
	public function add_record(){
		$DaysNum=$_GET['num'];
		if(strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
			$record_model=M('record');
			$data['RecordActivityId']=$_POST['ActivityId'];
			$data['RecordUserId']='test2';/////////////////////////////////////////////////////////
			$exist_data['RecordActivityId']=$data['RecordActivityId'];
			$exist_data['RecordUserId']=$data['RecordUserId'];
			$a=$record_model->where($exist_data)->find();
			for($x=1;$x<=$DaysNum;$x++){
				$dateName='slider_date_'.$x;
				$dateInfo=explode(',',$_POST['slider_'.$x]);
				$data['RecordDate']=$_POST[$dateName];
				$data['RecordDateStart']=$dateInfo[0];
				$data['RecordDateEnd']=$dateInfo[1];
				//echo $data['RecordDateStart'].$data['RecordDateEnd']."<br>";
				if(empty($a)){
					$record_model->add($data);
				}
				else{
					$record_model->where('RecordId = '.$_POST['record_id_'.$x])->save($data);
					echo "<script>alert('修改成功');window.location.href='../../participate/activity_id/".$_POST['ActivityId']."';</script>";
				}
				
				
			}
		}
	}
	public function show_zhu2(){
		$RecordModel=M('record');
		//$RDate='2015-12-27';
		$list=$RecordModel->where('RecordActivityId = '.$_GET['id'].' and RecordDate = "'.$RDate.' "' )->select();
		//var_dump($list);
		$DateList=$RecordModel->where('RecordActivityId = '.$_GET['id'])->Distinct(true)->field('RecordDate')->select();
		//var_dump($DateList);
		$this->assign('DateList',$DateList);
		$this->display();
		/*
		$listArray=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
		for($i=0;$i<count($list);$i++){
			$S=$list[$i]['RecordDateStart'];
			$E=$list[$i]['RecordDateEnd'];
			for($j=$S;$j<=$E;$j++){
				$b=$listArray[$j];
				$listArray[$j]=$b+1;
			}
		}
		$b="[";
		for($i=0;$i<count($listArray)-1;$i++){
			$b=$b.$listArray[$i].',';
		}
		$b=$b.$listArray[$i]."]";
		$this->assign('lista',$b);
		*/
		$this->display();
		//echo "<script>alert('".$_GET['id']."')</script>";
	}
	public function show_zhu(){
		$RecordModel=M('record');
		$DateList=$RecordModel->where('RecordActivityId = '.$_GET['id'])->Distinct(true)->field('RecordDate')->order('RecordDate asc')->select();
		$DateList_array=array();
		$DataList=array();
		$UserList=array();
		for($k=0;$k<count($DateList);$k++){
			$UserName=array("07点-08点：","08点-09点：","09点-10点：","10点-11点：","11点-12点：","12点-13点：","13点-14点：","14点-15点：","15点-16点：","16点-17点：","17点-18点：","18点-19点：","19点-20点：","20点-21点：","21点-22点：","22点-23点：");
			$DateList_array[$k]=$DateList[$k]['RecordDate'];
			$list=$RecordModel->where('RecordActivityId = '.$_GET['id'].' and RecordDate = "'.$DateList[$k]['RecordDate'].' "' )->select();
			$listArray=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
			for($i=0;$i<count($list);$i++){
				$S=$list[$i]['RecordDateStart'];
				$E=$list[$i]['RecordDateEnd'];
				for($j=$S;$j<$E;$j++){
					$UserName[$j]=$UserName[$j].$list[$i]['RecordUserId'].';';
					$b=$listArray[$j];
					$listArray[$j]=$b+1;
				}
			}
			// 姓名
			$NameTemp="";
			for($m=0;$m<17;$m++){
				if (strlen($UserName[$m])>14){
					$NameTemp=$NameTemp.$UserName[$m]."<br>";
				}
			}
			$UserList[$k]=$NameTemp;
			//数据
			$b="[";
			for($i=0;$i<count($listArray)-1;$i++){
				$b=$b.$listArray[$i].',';
			}
			$b=$b.$listArray[$i]."]";
			$DataList[$k]=$b;
		}
		//var_dump($UserList);
		$this->assign('DateList',$DateList_array);
		$this->assign('DataList',$DataList);
		$this->assign('NumDate',count($DateList));
		$this->assign('UserList',$UserList);
		echo strlen('07点-08点：');
		$this->display();
		//echo "<script>alert('".$_GET['id']."')</script>";
	}
	
}