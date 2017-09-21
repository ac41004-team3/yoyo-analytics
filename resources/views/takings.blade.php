{{--@extends('layouts.app')--}}
<meta name="csrf-token" content="{{ csrf_token() }}">
{{--@section('content')--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
        generateChart();
    });

  $("#generate").click(function(){
//      $.post("/getOutletTotals",{'outlet':"Library"})
//          .done(function(data){
//            generateChart(data);
//      })

      $.ajax({
          method:'POST',
          url:'getOutletTotals',
          data:{outlet:"Library"}
         }).done(function(data){
              generateChart(data);
          });

    });




    function generateChart() {




        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
                datasets: [{
                    label: 'apples',
                    data: [12, 19, 3, 17, 6, 3, 7],
                    backgroundColor: "rgba(153,255,51,0.4)"
                }, {
                    label: 'oranges',
                    data: [2, 29, 5, 5, 2, 3, 10],
                    backgroundColor: "rgba(255,153,0,0.4)"
                }]
            }
        });


    }
</script>

<style>
    .container {
        width: 50%;
        margin: 15px auto;
    }
</style>

</body>
{{--@endsection--}}