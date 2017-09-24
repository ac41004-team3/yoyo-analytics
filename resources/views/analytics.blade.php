@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">Your Chart</div>
                <div class="panel-body"><canvas id="myChart" width="100" height="50"></canvas></div>
            </div>
        </div>

        <div class="col-sm-4">

        <div class="row">
        <div class="col-sm-12">
            <h4><b>Chart Selection</b></h4>
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox" style="cursor: pointer;">
                <img class="img-fluid" src="{{ URL::asset('/images/charts/line-graphic.svg')}}" alt="Line Graph Icon">
                <p>Line</p>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                <img class="img-fluid" src="{{ URL::asset('/images/charts/bar-chart.svg')}}" alt="Bar Chart Icon">
                <p>Bar</p>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                <img class="img-fluid" src="{{ URL::asset('/images/charts/pie-chart.svg')}}" alt="Pie Chart Icon">
                <p>Pie</p>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                <img class="img-fluid" src="{{ URL::asset('/images/charts/radar-chart.svg')}}" alt="Radar Chart Icon">
                <p>Radar</p>
            </div>
        </div>
        </div>
        </div>

    <div class="row">
        <div class="col-sm-12">

            <div class="row">
             <div class="col-sm-12">
                 <h4><b>Tribe Selection</b></h4>
             </div>

            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                <img class="img-fluid" src="{{ URL::asset('/images/tribes/whale.svg')}}" alt="Whales Tribal Icon">
                <p>Whales</p>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                <img class="img-fluid" src="{{ URL::asset('/images/tribes/chicken.svg')}}" alt="Early Birds Tribal Icon">
                <p>Early Birds</p>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                <img class="img-fluid" src="{{ URL::asset('/images/tribes/owl.svg')}}" alt="Night Owl Tribal Icon">
                <p>Night Owls</p>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                <img class="img-fluid" src="{{ URL::asset('/images/tribes/boss.svg')}}" alt="Creatures of Habit Tribal Icon">
                <p>Creatures of Habit</p>
            </div>
         </div>

         <div class="row">
             <div class="col-sm-12">
                 <h4><b>Outlet Selection</b></h4>
             </div>

            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                <img class="img-fluid" src="{{ URL::asset('/images/outlets/floorfive.svg')}}" alt="Floor Five Icon">
                <p>Floor Five</p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                <img class="img-fluid" src="{{ URL::asset('/images/outlets/air_bar.svg')}}" alt="Air Bar Icon">
                <p>Air Bar</p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
              <img class="img-fluid" src="{{ URL::asset('/images/outlets/foodonfour.svg')}}" alt="Food on Four Icon">
              <p>Food on Four</p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
              <img class="img-fluid" src="{{ URL::asset('/images/outlets/liar_bar.svg')}}" alt="Liar Bar Icon">
              <p>Liar Bar</p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
              <img class="img-fluid" src="{{ URL::asset('/images/outlets/reception.svg')}}" alt="Level 2 Reception Icon">
              <p>Level 2 Reception</p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                <img class="img-fluid" src="{{ URL::asset('/images/outlets/mono.svg')}}" alt="Mono Bar Icon">
                <p>Mono Bar</p>
            </div>


            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                <img class="img-fluid" src="{{ URL::asset('/images/outlets/library.svg')}}" alt="Main Library Icon">
                <p>Main Library</p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                <img class="img-fluid" src="{{ URL::asset('/images/outlets/cafe.svg')}}" alt="Dental Cafe Icon">
                <p>Dental Café</p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
              <img class="img-fluid" src="{{ URL::asset('/images/outlets/djcad_cantina.svg')}}" alt="DJCAD Cantina Icon">
              <p>DJCAD Cantina</p>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
              <img class="img-fluid" src="{{ URL::asset('/images/outlets/ninewells.svg')}}" alt="Ninewells Shop Icon">
              <p>Ninewells Shop</p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
              <img class="img-fluid" src="{{ URL::asset('/images/outlets/premier.svg')}}" alt="Premier Shop Icon">
              <p>Premier Shop</p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
              <img class="img-fluid" src="{{ URL::asset('/images/outlets/collegeshop.svg')}}" alt="College Shop Icon">
              <p>College Shop</p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                <img class="img-fluid" src="{{ URL::asset('/images/outlets/dusa_marketplace.svg')}}" alt="DUSA Marketplace Icon">
                <p>DUSA Marketplace</p>
            </div>
         </div>
        </div>
    </div>
        </div>
    </div>

</div>
<div>

</div>
@endsection
@section('scripts')
<script>
window.onload = function() {
    var outlets = {!! json_encode($outlets->toArray()) !!}; //Example, array of outlets
    var transactions = {!! json_encode($transactions->toArray()) !!};
    var customers = {!! json_encode($customers->toArray()) !!};
    console.log(customers);
    for (i in transactions)
    {
        //document.write(transactions[i].date + "<br />");
    }

    var currentChart = { //Object which holds data on current chart, modify using setter methods
        type: null,
        metric: null,
        user: 'None',
        tribe: 0,
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
            currentChart.timePeriod[0] = this.getMoment().add(1,'hours');
        }
    });

    var endDatePicker = new Pikaday({
        field: document.getElementById('EndDate'),
        maxDate: moment().toDate(),
        onSelect: function() {
            currentChart.timePeriod[1] = this.getMoment().add(24, 'hours');
        }
    });

    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'line',
        data: barChartData,
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
}
function changeChartType(chartType) {
    currentChart.type = chartType;
}

function addOutlet(outletID) {
    currentChart.outlets.indexOf(outletID) === -1 ? currentChart.outlets.push(outletID) : currentChart.outlets.splice(currentChart.outlets.indexOf(outletID), 1);
}

function setMetric(metric) {
    currentChart.metric = metric;
}

function setTribe(tribe) {
    if (currentChart.tribe === tribe) {
        currentChart.tribe = 0;
    }
    else {
        currentChart.tribe = tribe;
    }
}
function setUser(user) {
    currentChart.user = user;
}

//narrow function in the future?
function buildChart() {
    barChartData = {
        labels: [],
        datasets: []
    };
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
        switch (currentChart.type) {
            case 'bar':
            case 'doughnut':
            var dataList = {
                label: null,
                backgroundColor: getRandomColor(),
                borderColor: '#000000',
                data: []
            };
            break;
            case 'radar':
            case 'line':
            var dataList = {
                label: null,
                borderColor: getRandomColor(),
                data: []
            };
            break;
            default:
            console.log("something went wrong");
            break;
        }
        for (k in outlets) {
            if (outlets[k].id === currentChart.outlets[j]) {
                dataList.label = outlets[k].name;
            }
        }
        for (var key in calculations[j]) {
            if (calculations[j].hasOwnProperty(key)) {
                if (barChartData.labels.indexOf(key) === -1) {
                    if (typeof key !== "undefined") {
                        barChartData.labels.push(key);
                    }
                }
                dataList.data.push(calculations[j][key]);
            }
        }

        barChartData.datasets.push(dataList);
    }
    myChart.destroy();
    myChart = new Chart(ctx, {
    type: currentChart.type,
        data: barChartData,
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
        }
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
                switch (currentChart.tribe) {
                    case 1:
                    if (minutesOfDay(moment(transactions[i].date)) > minutesOfDay(moment('2013-01-01T20:00:00.000'))) {
                        transactionList.push(transactions[i]);
                    }
                    break;
                    case 2:
                    if (minutesOfDay(moment(transactions[i].date)) < minutesOfDay(moment('2013-01-01T09:00:00.000'))) {
                        transactionList.push(transactions[i]);
                    }
                    break;
                    case 3:
                    if (transactions[i].total / 100 > 15) {
                        transactionList.push(transactions[i]);
                    }
                    default:
                    transactionList.push(transactions[i]);
                    break;
                }
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
        if (currentChart.user !== 'None') {
            if (transactionList[j].customer_id !== currentChart.user) {
                continue;
            }
        }
        if (initDate === false) {
            lastTime = moment(transactionList[j].date).format("YYYY-MM-DD");
            initDate = true;
        }
        if (lastTime !== moment(transactionList[j].date).format("YYYY-MM-DD")) {
            metricCalculation[lastTime] = sum;
            sum = 0;
        }
        switch (currentChart.metric) {
             case 1:
             sum += transactionList[j].total / 100;
             break;
             case 2:
             sum += transactionList[j].discount / 100;
             break;
             case 3:
             sum += transactionList[j].spent / 100;
             break;
             case 4:
             sum += 1;
             break;
             case 5:
             if (transactionList[j].type === "Redemption") {
                 sum += 1;
             }
             break;
             case 6:
             if (transactionList[j].type === "Payment") {
                 sum += 1;
             }
             break;
             default:
             break;
        }
        lastTime = moment(transactionList[j].date).format("YYYY-MM-DD");
    }
    if (sum > 0) {
         metricCalculation[lastTime] = sum;
    }
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
function minutesOfDay(m) {
    return m.minutes() + m.hours() * 60;
}
</script>
@endsection
