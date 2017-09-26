<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js"></script>

@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-2">

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
            <div class="col-sm-4 col-sm-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Stats</div>
                    <div class="panel-body" id="stats">
                        <tr>

                        </tr>


                    </div>

                </div>
            </div>
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Today's Chart</div>
                    <div class="panel-body">content</div>
                    <canvas id="myChart"  ></canvas>
                </div>
            </div>
        </div>
    </div>




@endsection


<script>
    $( document ).ready(function() {
        $.ajaxSetup({
            headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        getChartData();
        getOutletStats();
    });

    function getChartData()
    {
        $.ajax({

            url: 'getOutletTotals/{outlet}',
            method: 'GET',
            data: {outlets: ["241","242","238","2676","236","240"]},
            success: function (data) {
         //   debugger;
                generateChart(data);

            }

        });
    }

    function getOutletStats()
    {
        $.ajax({

            url: 'getOutletStats/{outlet}',
            method: 'GET',
            data: {outlets: ["241","242","238","2676","236","240"]},
            success: function (data) {

             //   debugger;
               // alert(data);
                $.each(data, function(index,value){

                    var  average_spend = ((value[0].total/100)/value[0].transaction_count).toFixed(2);

                    var markup="<table> <th>"+value[0].outlet_name+"</th>" +
                        "<tr><td>No. of Transactions:</td><td>  "+value[0].transaction_count+"</td></tr>"+
                        "<tr><td>Total Takings:</td><td>  £"+value[0].total/100+"</td></tr>"+
                        "<tr><td>Total Discount:</td><td>  £"+(value[0].discount_total/100).toFixed(2)+"</td></tr>"+
                        "<tr><td>No. of Customers:</td><td>  "+value[0].customer_count+"</td></tr>"+
                        "<tr><td>Average Spend:</td><td>  £"+average_spend+"</td></tr>"+
                        "</table></br>"


                    $('#stats').append(markup);
                    //
//
//   $('#stats').append("<ul>"+value.outlet_name+"</ul></br>");
//                    $('#stats').append("<b>Number of Transactions: £</b>" + value.transaction_count+"</br>");
//                    $('#stats').append("<b>Total Takings: £</b>" + value.total/100 +"</br>");
//                    $('#stats').append("<b>Number of Customers: £</b>" + value.customer_count+"</br>");
//                    $('#stats').append("<b>Average spend: £</b>" + average_spend+"</br>");
                });
            }

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


    function generateChart(data) {
//

       // var points =[]
        var total_takings=0;
        // transaction count needs passed by controller as transactions are combined server side
        var total_transactions=0;
        var discount_used=0;
        //debugger;
        var datasets=[];
debugger;
        $.each(data, function(index,value) {
            var i=0;
            var points =[];
            var randomcolor=getRandomColor();
            var outlet_name = value.outlet_name;
            $.each(value, function (index, innervalue) {
                if (index != "outlet_name") {

                    var date = new Date(innervalue.date)
                    var total = innervalue.total / 100;
                    //total_takings += total;


                    points.push({x: date, y: total});
                }

            });
            i+=1;
            datasets.push({
                label: outlet_name,
                data:points,
                borderColor:randomcolor,
                backgroundColor: randomcolor,
                fill:false,

            })
            debugger;
        });

       // debugger;

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                //labels: dates,
                datasets: datasets
            },
            options: {
                scales: {
                    xAxes: [{
                        type: 'time',
                        time: {
                            time: {
                                unit: 'month',
                                round: 'month',
                                displayFormats: {
                                    month: 'MMM '
                                }
                            }
                        }
                    } ]
                }
            }


        });


    }
</script>
<style>
    th {
        text-decoration: underline;
    }
</style>