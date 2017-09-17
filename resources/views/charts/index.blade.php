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
    <div style="width:75%; height:50%;">
        <canvas id="myChart" width="100" height="100"></canvas>
        <script>
        var currentChartData = {

        }
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
            myChart.destroy();
            myChart = new Chart(ctx, {
                type: chartType
            });
        }
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
