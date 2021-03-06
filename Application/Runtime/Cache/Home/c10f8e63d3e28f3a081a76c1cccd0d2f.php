<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<title>时间匹配</title>
<link href="/timematch/Public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="/timematch/Public/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="/timematch/Public/css/prism.css">
<link rel="stylesheet" href="/timematch/Public/css/jquery.range.css">
<script src="/timematch/Public/js/jquery.min.js"></script>
<script src="/timematch/Public/js/bootstrap.mim.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="/timematch/Public/js/jquery-1.11.1.min.js"></script>
<script src="/timematch/Public/js/bootstrap.js"></script>
<script src="/timematch/Public/js/responsiveslides.min.js"></script>
<script src="/timematch/Public/js/prism.js"></script>
<script src="/timematch/Public/js/jquery.range.js"></script>

<script>
$(function () {
  $("#slider").responsiveSlides({
	auto: true,
	nav: true,
	speed: 500,
	namespace: "callbacks",
	pager: true,
  });
});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		var screen_width=screen.width/1.6;
		$('.range-slider').jRange({
			from: 0,
			to: 16,
			step: 1,
			//scale: ['7:00','7:30','8:00','8:30','9:00','9:30','10:00','10:30','11:00','11:30','12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00','19:30','20:00','20:30','21:00','21:30','22:00','22:30','23:00','23:30','24:00'],
			scale: ['7点','8点','9点','10点','11点','12点','13点','14点','15点','16点','17点','18点','19点','20点','21点','22点','23点'],
			format: '%s',
			width: screen_width,
			theme: 'theme-blue',
			showLabels: true,
			isRange : false
		});
	});
</script>
<script>
	function show_table(){
		if(document.getElementById('activity_info').style.display=="none"){
		document.getElementById('activity_info').style.display="block";
		}
		else{
			document.getElementById('activity_info').style.display="none";
			}
	
}
	function get_url2(id){
		//var a="hello world"+id; 
		//window.clipboardData.setData('Text','$a'); 
		//copy_code(a);
		var url='http://221.207.242.123/timeMatching/index/participate/activity_id/'+id;
		var label=document.getElementById("url"); 
		label.innerText=url; 
		$("#url").html(url); 
	}
	function copy_code(copyText) 
    {
        if (window.clipboardData) 
        {
            window.clipboardData.setData("Text", copyText);
        } 
        else 
        {
            var flashcopier = 'flashcopier';
            if(!document.getElementById(flashcopier)) 
            {
              var divholder = document.createElement('div');
              divholder.id = flashcopier;
              document.body.appendChild(divholder);
            }
            document.getElementById(flashcopier).innerHTML = '';
            var divinfo = '<embed src="../js/_clipboard.swf" FlashVars="clipboard='+encodeURIComponent(copyText)+'" width="0" height="0" type="application/x-shockwave-flash"></embed>';
            document.getElementById(flashcopier).innerHTML = divinfo;
        }
      alert('copy成功！');
    }
	function show_info(){
		//alert('asdf');
		alert(document.getElementsByName('slider_2')[0].value);
	}
	function show_zhu(id){
		window.location.href='../../show_zhu/id/'+id;
	}
</script>
</head>

<body>

<!--header-->
		<!--about-->
		<div class="content">
			<div class="about-section">
				<div class="container">
					<h2>时间匹配</h2>
					<!--<img src="/timematch/Public/images/slider.jpg" class="img-responsive" alt="/">
					<h5>巴拉巴拉广告语</h5>-->
					<!--<p>Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi.</p>-->
					
					<div>
						<div style="display:none">
							<label for="demo">Demo</label>
							<select name="demo" id="demo" class="changes">
								<option value="date" selected>Date</option>
							</select>
						</div>
						<div class="form-group">
							
							<form action='../../../../add_record/num/<?php echo ($Num_Date); ?>' method="post">
							<input type="hidden" name="UserOpenId" value="<?php echo ($UserName['UserOpenid']); echo ($UserName['RecordUserId']); ?>" >
							<table class="table">
								<tr>
									<td width="33%"><B>您的姓名:</B></td><td><input type="text" name="UserName" class="form-control" value="<?php echo ($UserName['UserNickName']); echo ($UserName['RecordUserName']); ?>"></td>
								</tr>
								<tr>
									<td width="33%"><B>活动名称:</B></td><td><?php echo ($list['ActivityTitle']); ?></td>
								</tr>
								<tr>
									<td><B>活动地点:</B></td><td ><?php echo ($list['ActivityPlace']); ?></td>
								</tr>
								<tr>
									<td><B>发起人:</B></td><td><?php echo ($list['ActivityLeaderName']); ?></td>
								</tr>
								<tr>
									<td><B>开始日期:</B></td><td><?php echo ($list['ActivityStartDate']); ?></td>
								</tr>
								<tr>
									<td><B>结束日期:</B></td><td><?php echo ($list['ActivityEndDate']); ?></td>
								</tr>
								<tr>
									<td><B>备注:</B></td><td><?php echo ($list['ActivityRemark']); ?></td>
								</tr>
								
								
								
							</table>
							
							<table class="table">
								<tr>
									<td colspan="2">请选择以下几天您的空闲时间</td>
								</tr>
								<input type="hidden" name="ActivityId" value="<?php echo ($list['ActivityId']); ?>">
								<?php if(is_array($AllDate)): $i = 0; $__LIST__ = $AllDate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><td><font size="1px;"><B><?php echo ($vo['date']); ?></B></font></td><td><div class="demo-output" ><input type="hidden" name="slider_date_<?php echo ($i); ?>" value="<?php echo ($vo['date']); ?>">
									
									<?php if($vo["value"] == ''): ?><input class="range-slider" name="slider_<?php echo ($i); ?>" type="hidden" value="0,0"/>
									<?php else: ?>
										<input type="hidden" name="record_id_<?php echo ($i); ?>" value="<?php echo ($vo['record_id']); ?>"><input class="range-slider" name="slider_<?php echo ($i); ?>" type="hidden" value="<?php echo ($vo['value']); ?>"/><?php endif; ?>
									</div></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</table>
							<button class="btn btn-warning" onclick="this.form.submit()">提交</button>
							</form>
							
						</div>
						
					</div>
					<!--<button class="btn btn-warning" onclick="show_zhu(<?php echo ($list['ActivityId']); ?>)">查看活动情况</button>-->
					
				</div>
			</div>
		<!--about-->
		<!--why-choose-->
		<!--
			<div class="why-choose">
				<div class="container">
					<h3>Awards & recognitions</h3>
					<div class="choose-grids">
						<div class="col-md-4 choose-grid">
							<h4>1. Vestibulum iaculis</h4>
							<p>Mauris asan nulla vel diam. Sed in lacus ut enim adipiscing aliquetulla venenat pede mi, aliquet sit amet, euismod in, auctor ut, ligula. Aliquam dapibus tincidunt metus. Praesent justo dolor, lobortis quis, lobortis dignissim.</p>
						</div>
						<div class="col-md-4 choose-grid">
							<h4>2. Mauris asan nulla</h4>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing ellente ssed dololiquam congu fermentum nisl. Mauris asan nulla vel diam. Sed in lacus ut enim adipiscing aliquetulla venenat pede mi, aliquet sit amet, euismod in, auctor ut.</p>
						</div>
						<div class="col-md-4 choose-grid">
							<h4>3. faucibus risus</h4>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing ellente ssed dololiquam congu fermentum nisl. Mauris asan nulla vel diam. Sed in lacus ut enim adipiscing aliquetulla venenat pede mi, aliquet sit amet, euismod in, auctor ut.</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>	
			</div>
		
			<div class="ourteam">
				<div class="container">
					<h3>our team</h3>
					<div class="team-grids">
						<div class="col-md-3 team-grid">
							<img src="/timematch/Public/images/t1.jpg" class="img-responsive" alt="" />
							<h4>Bradley Grosh</h4>
							<p>Were dolor in hendrerit in vulputate velit esse molestie con sequat</p>
						</div>
						<div class="col-md-3 team-grid">
							<img src="/timematch/Public/images/t2.jpg" class="img-responsive" alt="" />
							<h4>david austin</h4>
							<p>Were dolor in hendrerit in vulputate velit esse molestie con sequat</p>
						</div>
						<div class="col-md-3 team-grid">
							<img src="/timematch/Public/images/t3.jpg" class="img-responsive" alt="" />
							<h4>Patrick Pool</h4>
							<p>Were dolor in hendrerit in vulputate velit esse molestie con sequat</p>
						</div>
						<div class="col-md-3 team-grid">
							<img src="/timematch/Public/images/t4.jpg" class="img-responsive" alt="" />
							<h4>Dayle Peters</h4>
							<p>Were dolor in hendrerit in vulputate velit esse molestie con sequat</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		
				<div class="whatweoffer">
					<div class="container">
						<h3>What We Offer</h3>
						<div class="offer-grids">
							<div class="col-md-7 offer-grid">
								<h4>Donec leo tellus, porta sit amet auctor id, porttitor</h4>
								<p>Donec leo tellus, porta sit amet auctor id, porttitor scelerisque neque. Mauris varius a massa eu fringilla. Duis tempus lectus pharetra dui posuere eleifend ut et nibh. Proin finibus libero sed augue cursus, non fermentum purus pellentesque. Praesent vel mauris mauris. Lorem ipsum dolor sit amet, consectetur adip.</p>
								<p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec ut nunc sagittis velit hendrerit gravida. Proin velit risus, dapibus in purus at, ultricies suscipit neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce consequat diam et nulla commodo tincidunt eget vel massa. Sed mattis ex id orci dictum dictum</p>
							</div>
						<div class="col-md-5 offer-grid1">
							<h4>Fusce interdum metus et turpis</h4>
								<div class="progress">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
											<span class="sr-only">40% Complete (success)</span>
									</div>
								</div>
							<h4>Lacinia fermentum</h4>
								<div class="progress">
									 <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
											<span class="sr-only">20% Complete</span>
									 </div>
								</div>
							<h4>Aenean nec eros luctus</h4>
								<div class="progress">
									<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
										<span class="sr-only">60% Complete (warning)</span>
									</div>
								</div>
							<h4>Vestibulum ante faucibus orci</h4>
								<div class="progress">
									<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
										<span class="sr-only">80% Complete (danger)</span>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				
				<div class="touch-section">
					<div class="container">
						<h3>get in touch</h3>
						<div class="touch-grids">
							<div class="col-md-4 touch-grid">
								<h4>address</h4>
								<h5>Gold Plaza</h5>
								<p>9870St Vincent Place,</p>
								<p>Glasgow, DC 45 Fr 45.</p>
								<p>United Kingdom</p>
							</div>
							<div class="col-md-4 touch-grid">
								<h4>Sales</h4>
								<h5>Sales Enquiries</h5>
								<p>Telephone : +1 800 603 6035</p>
								<p>Fax : +1 800 889 9898</p>
								<p>E-mail : <a href="mailto:example@mail.com"> example@mail.com</a></p>
							</div>
							<div class="col-md-4 touch-grid">
							<h4>general</h4>
									<h5>Gold Plaza</h5>
								<p>Telephone : +1 800 603 6035</p>
								<p>Fax : +1 800 889 9898</p>
								<p>E-mail : <a href="mailto:example@mail.com"> example@mail.com</a></p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					</div>
				
		
			</div>
		
			<div class="footer-section">
				<div class="container">
					<div class="footer-top">
						<p>Copyright &copy; 2015.哈尔滨工业大学-李晓明 <br>All rights reserved.</p>
					</div>
				</div>
			</div>
			-->
</body>
</html>