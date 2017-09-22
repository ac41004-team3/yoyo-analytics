{{--@extends('layouts.app')--}}
<meta name="csrf-token" content="{{ csrf_token() }}">
{{--@section('content')--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js"></script>

<body>
<div class="container">

    <h1>Takings</h1>
    <div>
        <canvas id="myChart"  ></canvas>
    </div>

    <button id="generate">Generate Chart</button>
</div>



<script>
    $( document ).ready(function() {
        $.ajaxSetup({
            headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
       // generateChart();
    });

  $("#generate").click(function() {
//      $.post("/getOutletTotals",{'outlet':"Library"})
//          .done(function(data){
//            generateChart(data);
//      })

      $.ajax({

          url: 'getOutletTotals/{outlet}',
          method: 'GET',
          data: {outlet: "241"},
          success: function (data) {
         // debugger;
              //alert(data);

              generateChart(data);
          }

      });
  });



    function generateChart(data) {
//        var dates=[];
//        var totals=[];
//
//        $.each(data, function(index,value){
//
//            dates.push(value.date);
//
//            totals.push(value.total);
//
//        });

        var points =[]

        $.each(data, function(index,value){
                var date=new Date(value.date)
            var total= value.total/100;
            points.push({x:date, y:total});


        });

        //debugger;

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                //labels: dates,
                datasets: [{
                    label: 'Outlet',
                    data:points,
                    borderColor:"rgba(153,255,51,0.4)",
                    backgroundColor: "rgba(153,255,51,0.4)",
                    fill:false,
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        type: 'time',
                        time: {
                            time: {
                                unit: 'day',
                                round: 'day',
                                displayFormats: {
                                    day: 'MMM D'
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
    .container {
        width: 75%;
        margin: 15px auto;
    }
</style>

</body>
{{--@endsection--}}