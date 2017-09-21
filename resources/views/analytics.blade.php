@extends('layouts.app')

@section('content')

<div class="container-fluid">
    
    <div class="row">
        <div class="col-sm-10 col-sm-offset-2">     
            <p><h1><u>Charts</u>:</h1> Select your chart</p>
        <div class="row">
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 selectionBox">
                <img src="{{ URL::asset('/images/charts/line-graphic.svg')}}">
                <p>Line</p>
            </div>
            
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 selectionBox">
                <img src="{{ URL::asset('/images/charts/bar-chart.svg')}}">
                <p>Bar</p>
            </div>
                
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 selectionBox">
                <img src="{{ URL::asset('/images/charts/pie-chart.svg')}}">
                <p>Pie</p> 
            </div>
            
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 selectionBox">
                <img src="{{ URL::asset('/images/charts/abc.svg')}}">
                <p>Spatial</p>
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
            
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 selectionBox">
                <img src="{{ URL::asset('/images/outlets/floorfive.svg')}}">
                <p>Floor Five</p>
            </div>
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 selectionBox">
                <img src="{{ URL::asset('/images/outlets/air_bar.svg')}}">
                <p>Air Bar</p>
            </div>  
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 selectionBox">
              <img src="{{ URL::asset('/images/outlets/foodonfour.svg')}}">
              <p>Food on Four</p>
            </div>
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 selectionBox">
              <img src="{{ URL::asset('/images/outlets/liar_bar.svg')}}">  
              <p>Liar Bar</p>
            </div>
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 selectionBox">
                <img src="{{ URL::asset('/images/outlets/mono.svg')}}">
                <p>Mono</p>
            </div>
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 selectionBox">
              <img src="{{ URL::asset('/images/outlets/reception.svg')}}">  
              <p>Level 2 Reception</p>
            </div>

             
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 selectionBox">
                <img src="{{ URL::asset('/images/outlets/dusa_marketplace.svg')}}">
                <p>DUSA Marketplace</p>
            </div>
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 selectionBox">
                <img src="{{ URL::asset('/images/outlets/library.svg')}}">
                <p>Library</p>
            </div>
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 selectionBox">
                <img src="{{ URL::asset('/images/outlets/cafe.svg')}}">
                <p>Dental Café</p>
            </div>            
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 selectionBox">
              <img src="{{ URL::asset('/images/outlets/djcad_cantina.svg')}}">  
              <p>DJCAD Cantina</p>
            </div>
             
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 selectionBox">
              <img src="{{ URL::asset('/images/outlets/ninewells.svg')}}">
              <p>Ninewells Shop</p>
            </div>
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 selectionBox">
              <img src="{{ URL::asset('/images/outlets/premier.svg')}}">  
              <p>Premier Shop</p>
            </div>
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 selectionBox">
              <img src="{{ URL::asset('/images/outlets/collegeshop.svg')}}">
              <p>College Shop</p>
            </div>      
             
         </div>
            </br>
            <div class="row">
                
             <div class="col-sm-12">
                 <p><b>Tribes</b></p>
             </div>
                
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 selectionBox">
                <img src="{{ URL::asset('/images/tribes/whale.svg')}}">
                <p>Whales</p>
            </div>
            
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 selectionBox">
                <img src="{{ URL::asset('/images/tribes/chicken.svg')}}">
                <p>Early Birds</p>
            </div>
                
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 selectionBox">
                <img src="{{ URL::asset('/images/tribes/owlface.svg')}}">
                <p>Night Owls</p>  
            </div>
            
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 selectionBox">
                <img src="{{ URL::asset('/images/tribes/boss.svg')}}">
                <p>Creatures of Habit</p> 
            </div>
         </div>
            
        </div>
    </div>
    
    
</div>

@endsection