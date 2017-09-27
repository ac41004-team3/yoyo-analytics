<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js"></script>
@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body alert-success">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading" id="statsheader">Stats</div>
                    <div class="panel-body" id="stats">
                        <tr>
                        </tr>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="panel panel-default">
                    <div class="panel-heading" id="chartheader">Charts</div>
                    <div class="panel-body">
                        <canvas id="myChart"></canvas>
                        </br>
                        <canvas id="peaksChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers:
                {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        });

        getChartData();
        generatePeaksChart();
        getOutletStats();

    });

    function getOutletStats() {

        $.ajax({

            url: 'getOutletStats/{outlet}',
            method: 'GET',
            data: {outlets: ['241', '242', '238', '2676', '236', '240']},
            success: function(data) {

                //   debugger;
                // alert(data);
                $.each(data, function(index, value) {

                    var average_spend = ((value[0].total / 100) / value[0].transaction_count).toFixed(2);

                    var markup = '<table> <th>' + value[0].outlet_name + '</th>' +
                        '<tr><td>No. of Transactions:</td><td>  ' + value[0].transaction_count + '</td></tr>' +
                        '<tr><td>Total Takings:</td><td>  £' + value[0].total / 100 + '</td></tr>' +
                        '<tr><td>Total Discount:</td><td>  £' + (value[0].discount_total / 100).toFixed(2) +
                        '</td></tr>' +
                        '<tr><td>No. of Customers:</td><td>  ' + value[0].customer_count + '</td></tr>' +
                        '<tr><td>Average Spend:</td><td>  £' + average_spend + '</td></tr>' +
                        '</table></br>';

                    $('#stats').append(markup);
                });
            },

        });
    }

    function getChartData() {
//     /   debugger;
        $.ajax({
            url: 'getOutletTotals/{outlet}',
            method: 'GET',
            data: {outlets: ['241', '242', '238', '2676', '236', '240']},
            success: function(data) {
                //   debugger;
                generateChart(data);
            },
        });
    }

    function generateChart(data) {
        $('#statsheader').append(' ' + data.year);
        //$('#chartheader').append(" "+data.year);
        var title = 'Daily sales value over time for outlets in ' + data.year;
        var datasets = [];

        $.each(data, function(index, value) {
            if (index != 'year') {
                var i = 0;
                var points = [];
                var randomcolor = getRandomColor();
                var outlet_name = value.outlet_name;
                $.each(value, function(index, innervalue) {
                    if (index != 'outlet_name') {
                        var date = new Date(innervalue.date);
                        var total = innervalue.total / 100;
                        //total_takings += total;
                        points.push({x: date, y: total});
                    }
                });
                i += 1;
                datasets.push({
                    label: outlet_name,
                    data: points,
                    borderColor: randomcolor,
                    backgroundColor: randomcolor,
                    fill: false,
                });
            }
        });

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                //labels: dates,
                datasets: datasets,
            },
            options: {
                title: {
                    display: true,
                    text: title,
                },
                scales: {
                    xAxes: [
                        {
                            type: 'time',
                            time: {
                                time: {
                                    unit: 'month',
                                    round: 'month',
                                    displayFormats: {
                                        month: 'MMM ',
                                    },
                                },
                            },
                        }],
                },
            },
        });
    }

    function generatePeaksChart() {
        //  debugger;
        $.ajax({
            url: 'getOutletPeaks/{outlet}',
            method: 'GET',
            data: {outlet: '241'},
            success: function(data) {
                //  debugger;
                var title = 'Average transactions over each hour in ' + data.outlet_name + ' for ' + data.year;
                var hours_transactions = [];

                //possibly the least efficient and most awkward way of doing this....
                for (i = 0; i < 24; i++) {
                    hours_transactions.push({hour: i, transactions: 0});
                }

                //   debugger;
                $.each(data, function(index, value) {
                    if (index == 'year') {}
                    else if (index == 'outlet_name') {}
                    else {
                        hours_transactions[value.hour].transactions = value.transaction_count;
                    }
                });

                var hours = [];
                var transactions = [];
                $.each(hours_transactions, function(index, value) {
                    hours.push(value.hour);
                    transactions.push(value.transactions);
                });

                var ctx = document.getElementById('peaksChart').getContext('2d');
                var peaksChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: hours,
                        datasets: [
                            {
                                label: 'Number of transactions',
                                backgroundColor: getRandomColor(),
                                data: transactions,
                            },
                        ],
                    },
                    options: {
                        title: {
                            display: true,
                            text: title,
                        },
                    },
                });
            },
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
<style>
    th {
        text-decoration: underline;
    }
</style>