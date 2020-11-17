<figure class="highcharts-figure">
	<div id="container"></div>
</figure>

<script type="text/javascript">
	var months = <?php echo $months; ?> ;
	var scores = <?php echo $scores; ?> ;
	Highcharts.chart('container', {
		chart: {
			type: 'line'
		},
		title: {
			text: 'Monthly Score Ratio'
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