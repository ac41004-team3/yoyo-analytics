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
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Active</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <form method="POST" action="{{ route('admin.users.store') }}">
                                    <td>
                                        <select value="{{ $user->role }}" name="role" id="role">
                                            @foreach(\Spatie\Permission\Models\Role::all() as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>

                                    @if ( $user->is_active ===1)
                                        <td><input type="checkbox" name="is_active" checked></td>
                                    @else
                                        <td><input type="checkbox" name="is_active"></td>
                                    @endif
                                    <td>
                                        <button type="submit" value='{{ $user->id }}' name="userid"> Update</button>
                                    </td>
                                    {{ csrf_field() }}
                                </form>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
