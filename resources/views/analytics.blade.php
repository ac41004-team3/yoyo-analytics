@extends('layouts.app')

@section('content')

<div class="container-fluid">
    
    <div class="row">
        <div class="col-sm-10 col-sm-offset-2">     
            <p><h1><u>Charts</u>:</h1> Select your chart</p>
        <div class="row">
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 selectionBox">
                <img src="">
                <p>Line Graph</p>
            </div>
            
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 selectionBox">
                <img src="">
                <p>Bar Chart</p>
            </div>
                
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 selectionBox">
                <img src="">
                <p>Pie Chart</p> 
            </div>
            
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 selectionBox">
                <img src="">
                <p>Spatial Chart</p>
            </div>
        </div>
        </div>
    </div>
    
    </br>
    
    <div class="row">
        <div class="col-sm-10 col-sm-offset-2">
            
            <p><h1><u>Options</u>:</h1> Customise your chart</p>
            
         <div class="row">
             <div class="col-sm-12">
                 <p><b>Outlets</b></p>
             </div>
             
            <div class="col-sm-3 selectionBox">
                one
            </div>
            
            <div class="col-sm-3 selectionBox">
                two
            </div>
                
            <div class="col-sm-3 selectionBox">
              three  
            </div>
            
            <div class="col-sm-3 selectionBox">
              four  
            </div>
         </div>
            </br>
            <div class="row">
                
             <div class="col-sm-12">
                 <p><b>Tribes</b></p>
             </div>
                
            <div class="col-sm-3 selectionBox">
                <img src="{{ URL::asset('/images/whale.jpg')}}">
                <p>Whales</p>
            </div>
            
            <div class="col-sm-3 selectionBox">
                <img src="">
                <p>Early Birds</p>
            </div>
                
            <div class="col-sm-3 selectionBox">
                <img src="">
                <p>Night Owls</p>  
            </div>
            
            <div class="col-sm-3 selectionBox">
                <img src="">
                <p>Creatures of Habit</p> 
            </div>
         </div>
            
        </div>
    </div>
    
    
</div>

@endsection