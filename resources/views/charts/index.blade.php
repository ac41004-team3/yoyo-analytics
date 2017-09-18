<!doctype html>
<html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
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
    <button id="" onclick="setTimePeriod('last hour')">Last Hour</button>
    <button id="" onclick="setTimePeriod('last day')">Last Day</button>
    <button id="" onclick="setTimePeriod('last week')">Last Week</button>
    <button id="" onclick="setTimePeriod('last month')">Last Month</button>
    <button id="" onclick="setTimePeriod('last three months')">Last Three Months</button>
    <button id="" onclick="setTimePeriod('last year')">Last Year</button>
    <button id="" onclick="setTimePeriod('all time')">All Time</button>
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
		console.log(transactions);
		for (i in transactions)
		{
			document.write(transactions[i].date + "<br />");
		}
		var metricEnum = { TRANSTOTAL: 1, DISCTOTAL: 2, SPENTTOTAL: 3, TRANSCOUNT: 4 };
		Object.freeze(metricEnum);
        //Basically an enum and can be treated syntaxically as such,
        //but sadly I can't statically type in Javascript :(
        //I may actually get rid of this, it might not be that useful.
        var outletID = {    DJCAD_CANTINA: 235,
                            AIR_BAR: 236,
                            FLOOR_FIVE: 237,
                            LIBRARY: 238,
                            DENTAL_CAFE: 239,
                            FOOD_ON_FOUR: 240,
                            LIAR_BAR: 241,
                            MONO: 242,
                            LEVEL_2_RECEPTION: 243,
                            PREMIER_SHOP_YOYO_ACCEPT: 343,
                            DUSA_THE_UNION_MARKETPLACE:456,
                            PREMIER_SHOP: 2676,
                            COLLEGE_SHOP: 2677,
                            NINEWELLS_SHOP: 2679
                        };
        var currentChart = { //Object which holds data on current chart, modify using setter methods
            type: null,
            data: null, //This'll be an object within object
            metric: null,
            timePeriod: [null, null], //Lower Bound, Now
            periodDefinition: null,
            outlets: []
        };
        //console.log(currentChart.data);
        //Temporary chart for example
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, { //PlaceHolder Chart
            type: 'bar',
            data: {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        getRandomColor(),
                        getRandomColor(),
                        getRandomColor(),
                        getRandomColor(),
                        getRandomColor(),
                        getRandomColor()
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        function changeChartType(chartType) {
            /*myChart.destroy();
            myChart = new Chart(ctx, {
                type: chartType
            });*/
            currentChart.data = chartType;
            console.log(currentChart.data);
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
        function addOutlet(outletID) {
			console.log(outletID);
			//if element exists push it on 
			currentChart.outlets.indexOf(outletID) === -1 ? currentChart.outlets.push(outletID) : currentChart.outlets.splice(currentChart.outlets.indexOf(outletID), 1);
			console.log(currentChart.outlets);
        }
        function setTimePeriod(time) {
			currentChart.periodDefintion = time;
			var now = moment().format("YYYY-MM-DD HH:mm:ss");
			console.log(now);
			var lowerBound;
			switch (time)
			{
				case 'last hour':
				lowerBound = moment().subtract(1, 'hours').format("YYYY-MM-DD HH:mm:ss");
				break;
				case 'last day':
				lowerBound = moment().subtract(1, 'days').format("YYYY-MM-DD HH:mm:ss");
				break;
				case 'last week':
				lowerBound = moment().subtract(1, 'week').format("YYYY-MM-DD HH:mm:ss");
				break;
				case 'last month':
				lowerBound = moment().subtract(1, 'month').format("YYYY-MM-DD HH:mm:ss");
				break;
				case 'last three months':
				lowerBound = moment().subtract(3, 'month').format("YYYY-MM-DD HH:mm:ss");
				break;
				case 'last year':
				lowerBound = moment().subtract(1, 'year').format("YYYY-MM-DD HH:mm:ss");
				break;
				case 'all time':
				lowerBound = moment('2010-01-01T00:00:00.000').format("YYYY-MM-DD HH:mm:ss");
				break;
				default:
				console.log('An invalid time period was recieved');
				break;
			}
			currentChart.timePeriod[0] = lowerBound;
			currentChart.timePeriod[1] = now;
			
		}
		function setMetric(metric) {
			currentChart.metric = metric;
		}
		function buildChart() {
			
		}
		function calculateMetric() {
			var metricCalculation = {};
			var currentTime;
			var sum = 0;
			switch (currentChart.metric) {
				case 1://Transaction Total
				for (i in transactions)
				{
					//document.write(transactions[i].date + "<br />");
					if (moment(transactions[i].date).isBetween(timePeriod[0], timePeriod[1]) && currentChart.outlets.indexOf(transactions[i].outlet_id) !== -1)
					{
						sum += transactions[i].total;
					}
				}
				metricCalculation['last hour'] = sum;
				break;
				default:
				console.log('An error occured whilst calculating');
				break;
			}
		}
        </script>
    </div>
</body>
</html>
