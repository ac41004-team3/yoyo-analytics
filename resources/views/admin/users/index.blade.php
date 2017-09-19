@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="col-md-6 col-md-offset-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Users</h3>
                </div>
                <div class="panel-body">
                    <table class="center table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Active</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <form method="POST" action="{{ route('admin.users.store') }}">
                                <tr>
                                    <td><a href="{{ route('admin.users.edit', $user->id) }}">{{ $user->name }}</a></td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ ucfirst($user->getRoleNames()->first()) }}</td>
                                    @if ($user->is_active)
                                        <td><i class="fa fa-times" aria-hidden="true"></i></td>
                                    @else
                                        <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                    @endif
                                    {{ csrf_field() }}
                                </tr>
                            </form>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
