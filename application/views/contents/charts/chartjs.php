<?php
    // Get report query
    foreach ($reports as $result) {
        // Get Month
        $month[] = $result->month;
        // Get Score
        $value[] = (float) $result->score;
    }
?>

<figure class="highcharts-figure">
	<div id="container"></div>
	<canvas id="myChart"></canvas>
</figure>

<script type="text/javascript">
	var ctx = document.getElementById('myChart').getContext('2d');
	var chart = new Chart(ctx, {
		// The type of chart we want to create
		type: 'line',

		// The data for our dataset
		data: {
			labels: <?php echo json_encode($month); ?> ,
			datasets: [{
				label: 'My First dataset',
				backgroundColor: 'rgb(255, 99, 132)',
				borderColor: 'rgb(255, 99, 132)',
				data: <?php echo json_encode($value); ?>
			}]
		},

		// Configuration options go here
		options: {}
	});
</script>