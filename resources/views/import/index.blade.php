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
                                <th>Date</th>
                                <th>Status</th>
                                <th>Uploader</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td><a href="{{ route('admin.users.edit', $user->id) }}">{{ $user->name }}</a></td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ ucwords($user->getRoleNames()->first()) }}</td>
                                    @if ($user->is_active)
                                        <td><i class="fa fa-times" aria-hidden="true"></i></td>
                                    @else
                                        <td><i class="fa fa-check" aria-hidden="true"></i></td>
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