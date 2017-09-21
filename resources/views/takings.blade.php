{{--@extends('layouts.app')--}}

{{--@section('content')--}}
<script src ="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container-fluid">

    <h1>Takings</h1>
<canvas id="takingschart" width="400" height="400"></canvas>

</div>


<script>
    $( document ).ready(function() {
       generateChart();
    });

    function getChartData()
    {
        $.ajax({
            //url:
        });
    }


    function generateChart(){

            var ctx = document.getElementById("takingschart").getContext('2d');
          var data= [{x:10,y:20},{x:15,y:25}];
        //var datedata = [{ x: new Date(2012, 01, 1), y: 26},
        var data =[1,2,3,4,6];
           var myLineChart = new Chart(ctx, {

              type:'line',

               data: {
                labels:[2001,2002,2003,2004,2005],
                   datasets: [{
                       label: "bananas",
                      // backgroundColor: 'rgb(255, 255, 255)',
                       borderColor: 'rgb(255, 99, 132)',
                       fill:false,
                       data: data
                   }
                   ]

               }


            });
    }
</script>

{{--@endsection--}}