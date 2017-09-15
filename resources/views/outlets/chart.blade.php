<!doctype html>
<html>
<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
	<title></title>
</head>
<body>
	<h1>Hello</h1>
<canvas id="projects-graph" width="1000" height="400"></canvas>
<script>
	$(function(){
	  $.getJSON("/outlets/chart", function (result) {
		var labels = [],data=[];
		for (var i = 0; i < result.length; i++) {
			labels.push(result[i].name);
			data.push(result[i].id);
		}
		var buyerData = {
		  labels : labels,
		  datasets : [
			{
			  fillColor : "rgba(240, 127, 110, 0.3)",
			  strokeColor : "#f56954",
			  pointColor : "#A62121",
			  pointStrokeColor : "#741F1F",
			  data : data
			}
		  ]
		};
		var buyers = document.getElementById('projects-graph').getContext('2d');
		var chartInstance = new Chart(buyers, {
			type: 'bar',
			data: buyerData,
		});
	  });
	});
</script>
</body>
</html>
