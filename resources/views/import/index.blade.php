@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Import Data</div>

                    <div class="panel-body">
                        <form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="file" name="data" class="input-file">
                            <input type="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection