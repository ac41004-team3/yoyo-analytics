@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Import Data</div>
                    <div class="panel-body">
                        <import-data></import-data>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Import History</div>
                    <div class="panel-body">
                        <table class="center table table-striped">
                            <thead>
                            <tr>
                                <th>Import</th>
                                <th>Uploader</th>
                                <th>When</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Import::all()->reverse() as $import)
                                <tr>
                                    <td>#{{ $import->id }}</td>
                                    <td>{{ $import->user()->first()->name }}</td>
                                    <td title="{{ $import->created_at }}">{{ $import->created_at->diffForHumans() }}</td>
                                    @if($import->status)
                                        <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                    @else
                                        <td><i class="fa fa-times" aria-hidden="true"></i></td>
                                    @endif
                                    <td><revert-import id="{{ $import->id }}" action="{{ route('admin.import.revert') }}"></revert-import></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection