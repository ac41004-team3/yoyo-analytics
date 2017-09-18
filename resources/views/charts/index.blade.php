<!doctype html>
<html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
    <title></title>
</head>
<body>
    <button id="Line" onclick="changeChartType('line')">Line</button>
    <button id="Bar" onclick="changeChartType('bar')">Bar</button>
    <button id="Pie" onclick="changeChartType('pie')">Pie</button>
    <button id="Spatial" onclick="changeChartType('radar')">Spatial</button>
    <br>
    <br>
    <button id="" onclick="">Transaction Total</button>
    <button id="" onclick="">Discount Total</button>
    <button id="" onclick="">Spent Total</button>
    <button id="" onclick="">Transaction Count</button>
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
            data: null//This'll be an object within object
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
			
        }
        function modifyTimePeriod() {
			
		}
		function modifyMeasurement() {
			
		}
		function setMetric() {
			
		}
        </script>
    </div>
</body>
</html>
