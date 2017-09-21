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
                <div class="panel-heading">Today's Date</div>
                <div class="panel-body">content</div>               
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">Today's Chart</div>
                <div class="panel-body">content</div>
            </div>
        </div>
    </div>
    
</div>
@endsection
