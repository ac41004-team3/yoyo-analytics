<!doctype html>
<html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css"/>
    <title></title>
</head>
<body>
    <button id="Line" onclick="changeChartType('line')">Line</button>
    <button id="Bar" onclick="changeChartType('bar')">Bar</button>
    <button id="Pie" onclick="changeChartType('pie')">Pie</button>
    <button id="Spatial" onclick="changeChartType('radar')">Spatial</button>
    <br>
    <br>
    <button id="" onclick="setMetric(1)">Transaction Total</button>
    <button id="" onclick="setMetric(2)">Discount Total</button>
    <button id="" onclick="setMetric(3)">Spent Total</button>
    <button id="" onclick="setMetric(4)">Transaction Count</button>
    <br>
    <br>
    <input type="text" id="StartDate">
    <input type="text" id="EndDate">
    <br>
    <br>
    @foreach ($outlets as $outlet)
		<button id="{{ $outlet->id }}" onclick="addOutlet({{ $outlet->id }})">{{ $outlet->name }}</button>
    @endforeach
    <div style="width:75%; height:50%;">
        <canvas id="myChart" width="100" height="100"></canvas>
        <script>
		//I will probably load in all data by default and simply trip the hidden:true|false
		var outlets = {!! json_encode($outlets->toArray()) !!}; //Example, array of outlets
		var transactions = {!! json_encode($transactions->toArray()) !!};
		var customers = {!! json_encode($customers->toArray()) !!};

		for (i in transactions)
		{
			document.write(transactions[i].date + "<br />");
		}

        var currentChart = { //Object which holds data on current chart, modify using setter methods
            type: null,
            metric: null,
            timePeriod: [], //Lower Bound, Now
            periodDefinition: null,
            outlets: []
        };

        var barChartData = {//each dataset will be a different outlet essentially
			labels: [],
			datasets: []
		};

		var startDatePicker = new Pikaday({
			field: document.getElementById('StartDate'),
			maxDate: moment().toDate(),
			onSelect: function() {
				currentChart.timePeriod[0] = this.getMoment();
			}
		});

		var endDatePicker = new Pikaday({
			field: document.getElementById('EndDate'),
			maxDate: moment().toDate(),
			onSelect: function() {
				currentChart.timePeriod[1] = this.getMoment();
			}
		});

        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart;

        function changeChartType(chartType) {
            currentChart.data = chartType;
            buildChart();
        }

        function addOutlet(outletID) {
			currentChart.outlets.indexOf(outletID) === -1 ? currentChart.outlets.push(outletID) : currentChart.outlets.splice(currentChart.outlets.indexOf(outletID), 1);
        }

		function setMetric(metric) {
			currentChart.metric = metric;
		}

        //narrow function in the future?
		function buildChart() {
            //myChart.destroy();
            var calculations = [];
            var labelSetup = [];
            for (i in currentChart.outlets) {
				calculations.push(calculateData(currentChart.outlets[i]));
			}
            var lowerBound = moment(currentChart.timePeriod[0]);
            while (lowerBound.isSameOrBefore(currentChart.timePeriod[1])) {
                labelSetup.push(lowerBound.format('YYYY-MM-DD'));
                lowerBound = lowerBound.add(1, 'days');
            }
			for (j in calculations) { //sep method
                var dataList = {
                    label: null,
                    backgroundColor: getRandomColor(),
                    data: []
                };
                dataList.label = currentChart.outlets[j];
				for (var key in calculations[j]) {
					if (calculations[j].hasOwnProperty(key)) {
						barChartData.labels.push(key);
                        dataList.data.push(calculations[j][key]);
					}
				}
                barChartData.datasets.push(dataList);
			}
            var myChart = new Chart(ctx, {
            type: 'bar',
				data: barChartData
            });
		}

		function calculateData(currentOutletID) {
			var metricCalculation = {};
			var transactionList = [];
			var lastTime;
			var sum = 0;
			for (i in transactions) {
				if (moment(transactions[i].date).isSameOrAfter(currentChart.timePeriod[0]) && moment(transactions[i].date).isSameOrBefore(currentChart.timePeriod[1])) {
					if (transactions[i].outlet_id === currentOutletID) {
						transactionList.push(transactions[i]);
					}
				}
			}
            var lower = moment(currentChart.timePeriod[0]);
            while (lower.isSameOrBefore(currentChart.timePeriod[1])) {
                metricCalculation[lower.format("YYYY-MM-DD")] = 0;
                lower = lower.add(1, 'days');
            }
			var initDate = false;
			for (j in transactionList) {
				if (initDate === false) {
					lastTime = moment(transactionList[j].date).format("YYYY-MM-DD");
					initDate = true;
				}
				if (lastTime !== moment(transactionList[j].date).format("YYYY-MM-DD")) {
					metricCalculation[lastTime] = sum;
					sum = 0;
				}
				sum += transactionList[j].total;
				lastTime = moment(transactionList[j].date).format("YYYY-MM-DD");
			}
			metricCalculation[lastTime] = sum;
            console.log(metricCalculation);
            return metricCalculation;
		}

		//SOURCE: https://stackoverflow.com/questions/1484506/random-color-generator
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
        </script>
    </div>
</body>
</html>
