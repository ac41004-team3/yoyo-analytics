@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Import Data</div>
                    <div class="panel-body">
                        <form action="{{ route('admin.import.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="file" name="data"/>
                            <input type="submit" value="Upload"/>
                        </form>
                        {{--<import-data></import-data>--}}
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
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
                                    <td title="{{ $import->updated_at }}">{{ $import->updated_at->diffForHumans() }}</td>
                                    <td>{{ ucfirst($import->status) }}</td>
                                    @if($import->status != 'reverted')
                                        <td>
                                            <revert-import id="{{ $import->id }}"
                                                           action="{{ route('admin.import.revert') }}"></revert-import>
                                        </td>
                                    @else
                                        <td></td>
                                    @endif
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