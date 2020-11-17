<figure class="highcharts-figure">
	<div id="monthlyCharts"></div>
	<div id="dailyCharts"></div>
</figure>

<script type="text/javascript">
	const months = <?php echo $months; ?> ,
		scores = <?php echo $scores; ?> ;
	Highcharts.chart('monthlyCharts', {
		chart: {
			type: 'line'
		},
		title: {
			text: 'Monthly Score Chart'
		},
		xAxis: {
			categories: months
		},
		yAxis: {
			title: {
				text: 'Value'
			}
		},
		legend: {
			layout: 'vertical',
			align: 'right',
			verticalAlign: 'middle'
		},
		plotOptions: {
			series: {
				label: {
					connectorAllowed: false
				}
			}
		},
		series: [{
			name: 'Score',
			data: scores
		}],
		responsive: {
			rules: [{
				condition: {
					maxWidth: 500
				},
				chartOptions: {
					legend: {
						layout: 'horizontal',
						align: 'center',
						verticalAlign: 'bottom'
					}
				}
			}]
		}
	});
</script>