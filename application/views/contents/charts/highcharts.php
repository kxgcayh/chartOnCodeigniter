<div class="card">
	<div class="card-body">
		<form action="javascript:void(0)" id="formFilter" method="post">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label class="sr-only" for="startdate">Start Date</label>
							<input type="date" class="form-control" name="startdate" id="startdate">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="sr-only" for="enddate">End Date</label>
							<input type="date" class="form-control" name="enddate" id="enddate">
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label class="sr-only" for="filterType">Example select</label>
							<select class="form-control" id="filterType">
								<option value="">Select Time</option>
								<option value="year">Year</option>
								<option value="month">Month</option>
								<option value="week">Week</option>
								<option value="day">Day</option>
								<option value="hour">Hour</option>
								<!-- <option value="minute">Minute</option> -->
							</select>
						</div>
					</div>
					<div class="col-md-2">
						<label class="sr-only" for=""></label>
						<button type="submit" class="btn btn-primary btn-block">Filter</button>
					</div>
				</div>
			</div>
			<div id="monthlyCharts"></div>
			<div id="dailyCharts"></div>
		</form>
	</div>
</div>

<?php echo $months; ?>

<script type="text/javascript">
	const months = <?php echo $months; ?> ,
		days = <?php echo $days; ?> ,
		scores = <?php echo $scores; ?> ;

	$(document).ready(function() {
		formFilter();
		stackedChart();
	})

	function formFilter() {
		$('#formFilter').submit(function() {
			let type = $('#filterType').val();
			stackedChart(type);
		})
	}

	function stackedChart(filter = 'month') {
		$.ajax({
			type: 'get',
			url: '<?php echo base_url('chartOnCodeigniter/ChartController/getData') ?>',
			data: {
				filter: filter
			},
			dataType: 'JSON',
			success: function(response) {
				console.log(response.data[0].data);
				console.log(scores);
				console.log(response.categories);
				console.log(months);
				Highcharts.chart('monthlyCharts', {
					chart: {
						type: 'line'
					},
					title: {
						text: 'Monthly Score Chart'
					},
					xAxis: {
						// categories: months
						categories: response.categories
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
					// series: [{
					// 	name: response.data[0].name,
					// 	data: response.data[0].data
					// }],
					// series: response.data[0].data,
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
			}
		})
	}
</script>