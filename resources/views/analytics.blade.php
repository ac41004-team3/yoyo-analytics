@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <chart :outlets="{{ \App\Outlet::all() }}"></chart>
                {{--<chart :outlets="{{ Auth::user()->outlets()->get() }}"></chart>--}}
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h4><b>Chart Selection</b></h4>
                        <div class="row">
                            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                                <img class="img-fluid" src="{{ URL::asset('/images/charts/line-graphic.svg')}}"
                                     alt="Line Graph Icon">
                                <p>Line</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                                <img class="img-fluid" src="{{ URL::asset('/images/charts/bar-chart.svg')}}"
                                     alt="Bar Chart Icon">
                                <p>Bar</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                                <img class="img-fluid" src="{{ URL::asset('/images/charts/pie-chart.svg')}}"
                                     alt="Pie Chart Icon">
                                <p>Pie</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                                <img class="img-fluid" src="{{ URL::asset('/images/charts/radar-chart.svg')}}"
                                     alt="Radar Chart Icon">
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
                                <img class="img-fluid" src="{{ URL::asset('/images/tribes/whale.svg')}}"
                                     alt="Whales Tribal Icon">
                                <p>Whales</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                                <img class="img-fluid" src="{{ URL::asset('/images/tribes/chicken.svg')}}"
                                     alt="Early Birds Tribal Icon">
                                <p>Early Birds</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                                <img class="img-fluid" src="{{ URL::asset('/images/tribes/owl.svg')}}"
                                     alt="Night Owl Tribal Icon">
                                <p>Night Owls</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                                <img class="img-fluid" src="{{ URL::asset('/images/tribes/boss.svg')}}"
                                     alt="Creatures of Habit Tribal Icon">
                                <p>Creatures of Habit</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h4><b>Outlet Selection</b></h4>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                                <img class="img-fluid" src="{{ URL::asset('/images/outlets/floorfive.svg')}}"
                                     alt="Floor Five Icon">
                                <p>Floor Five</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                                <img class="img-fluid" src="{{ URL::asset('/images/outlets/air_bar.svg')}}"
                                     alt="Air Bar Icon">
                                <p>Air Bar</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                                <img class="img-fluid" src="{{ URL::asset('/images/outlets/foodonfour.svg')}}"
                                     alt="Food on Four Icon">
                                <p>Food on Four</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                                <img class="img-fluid" src="{{ URL::asset('/images/outlets/liar_bar.svg')}}"
                                     alt="Liar Bar Icon">
                                <p>Liar Bar</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                                <img class="img-fluid" src="{{ URL::asset('/images/outlets/reception.svg')}}"
                                     alt="Level 2 Reception Icon">
                                <p>Level 2 Reception</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                                <img class="img-fluid" src="{{ URL::asset('/images/outlets/mono.svg')}}"
                                     alt="Mono Bar Icon">
                                <p>Mono Bar</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                                <img class="img-fluid" src="{{ URL::asset('/images/outlets/library.svg')}}"
                                     alt="Main Library Icon">
                                <p>Main Library</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                                <img class="img-fluid" src="{{ URL::asset('/images/outlets/cafe.svg')}}"
                                     alt="Dental Cafe Icon">
                                <p>Dental Café</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                                <img class="img-fluid" src="{{ URL::asset('/images/outlets/djcad_cantina.svg')}}"
                                     alt="DJCAD Cantina Icon">
                                <p>DJCAD Cantina</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                                <img class="img-fluid" src="{{ URL::asset('/images/outlets/ninewells.svg')}}"
                                     alt="Ninewells Shop Icon">
                                <p>Ninewells Shop</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                                <img class="img-fluid" src="{{ URL::asset('/images/outlets/premier.svg')}}"
                                     alt="Premier Shop Icon">
                                <p>Premier Shop</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                                <img class="img-fluid" src="{{ URL::asset('/images/outlets/collegeshop.svg')}}"
                                     alt="College Shop Icon">
                                <p>College Shop</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 selectionBox">
                                <img class="img-fluid" src="{{ URL::asset('/images/outlets/dusa_marketplace.svg')}}"
                                     alt="DUSA Marketplace Icon">
                                <p>DUSA Marketplace</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection