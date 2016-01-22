<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<title>活动时间统计情况</title>
<!-- 柱状图-->
<link href="/timematch/Public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<script src="/timematch/Public/js/jquery.min.1.9.js"></script>
<script src="/timematch/Public/js/bootstrap.js"></script>
<script src="/timematch/Public/js/echarts/build/dist/echarts.js"></script>
<script type="text/javascript">
	// 路径配置
	var myChart;
	var eCharts; 
	function createRandomItemStyle() {
		return {
			normal: {
				color: 'rgb(' + [
					Math.round(Math.random() * 160),
					Math.round(Math.random() * 160),
					Math.round(Math.random() * 160)
				].join(',') + ')'
			}
		};
	};
	require.config({
		paths: {
			echarts: '/timematch/Public/js/echarts/build/dist'
		}
	});
	require(
		[
			'echarts',
			'echarts/chart/bar', // 第一个折线图
		],DrawEChart 
		);
		function DrawEChart(ec){
			var id;
			for(id=1;id<=<?php echo ($NumDate); ?>;id++)
			{
				FunDrawEChart(ec,id);
				
			}
		}
		function FunDrawEChart(ec5,id) {
			// 基于准备好的dom，初始化echarts图表
			eCharts = ec5;  
			var div_name="main"+id;
			myChart = eCharts.init(document.getElementById(div_name)); 
			myChart.showLoading({  
                text : "图表数据正在努力加载..."  
            });  
			var option;
			option = {
				title: {
					x: 'center',
					text: '时间统计情况',
					//subtext: 'Rainbow bar example',
					//link: 'http://echarts.baidu.com/doc/example.html'
				},
				tooltip: {
					trigger: 'item'
				},
				toolbox: {
					show: false,
					feature: {
						dataView: {show: true, readOnly: false},
						restore: {show: true},
						saveAsImage: {show: true}
					}
				},
				calculable: true,
				grid: {
					borderWidth: 0,
					y: 80,
					y2: 60
				},
				xAxis: [
					{
						type: 'category',
						show: true,
						data: ['7点','8点','9点','10点','11点','12点','13点','14点','15点','16点','17点','18点','19点','20点','21点','22点','23点']
					}
				],
				
				yAxis: [
					{
						type: 'value',
						show: true
					}
				],
				series: [
					{
						name: '当前时间段人数',
						type: 'bar',
						itemStyle: {
							normal: {
								color: function(params) {
									// build a color map as your need.
									var colorList = [
									  '#C1232B','#B5C334','#FCCE10','#E87C25','#27727B',
									   '#FE8463','#9BCA63','#FAD860','#F3A43B','#60C0DD',
									   '#D7504B','#C6E579','#F4E001','#F0805A','#26C0C0','#7CFC00','#FF00FF',
									];
									return colorList[params.dataIndex]
								},
								label: {
									show: true,
									position: 'top',
									formatter: '{c}人'
								}
							}
						},
						data: [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
					}
				]
			};
			// 为echarts对象加载数据 
			var id_name="#data"+id;
			var bb=$(id_name).val();
			var date_name=$("#dataDate"+id).val();
			option.series[0].data = eval(bb);  
			option.title.text=date_name+"时间统计情况";
            myChart.setOption(option); 
			myChart.hideLoading();  
			 
		}
</script>
<!-- 柱状图结束-->
<script>
	function show_user(id)
	{
		if(document.getElementById("User"+id).style.display =='block')
			document.getElementById("User"+id).style.display='none';  
		else 
			document.getElementById("User"+id).style.display='block';  
	}
	 
</script>
</head>

<body>
	
				<?php if(is_array($DateList)): $i = 0; $__LIST__ = $DateList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div id="main<?php echo ($i); ?>" style="height:500px; width:1000px;">	
					</div>
					<input type="text" style="display:none" id="dataDate<?php echo ($i); ?>" value="<?php echo ($DateList[$i-1]); ?>">
					<input type="text" style="display:none" id="data<?php echo ($i); ?>" value="<?php echo ($DataList[$i-1]); ?>">
					<div style="margin-left:60px;">
						<button class="btn btn-warning" onclick="show_user(<?php echo ($i); ?>)">详情</button>
						<!--<a href="javascript:void(0)" onclick="show_user(<?php echo ($i); ?>)" style="cursor:pointer;">详情</a> -->
						<div id="User<?php echo ($i); ?>" style="display:none;">
							<?php echo ($UserList[$i-1]); ?>
						</div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<div style="margin-top:300px">
	
</body>
</html>