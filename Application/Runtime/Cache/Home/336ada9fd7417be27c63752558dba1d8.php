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

</head>

<body>

<!--header-->
		<!--about-->
		<div class="content">
			<div class="about-section">
				<div class="container">
					
					<?php echo ($ImgUrl); ?>
					
					<h5>添加成功！将该二维码发送至参与活动的好友或者将如下代码发送至该微信公众账号，获得该活动时间统计链接！</h5>
					<h5><font color="red"><?php echo ($ActivityInfo['ActivityIdMd5']); ?></font></h5>
							
						
					
					
					
					
					
					
				</div>
			</div>
		</div>
		
</body>
</html>