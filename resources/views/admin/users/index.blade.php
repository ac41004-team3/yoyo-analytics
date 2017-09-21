@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="col-md-4 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Add User</h3>
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="post" action="{{ route('admin.users.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group  @if ($errors->has('name')) has-error @endif">
                            <label class="control-label " for="name">
                                Name
                            </label>
                            <input class="form-control" id="name" name="name" type="text"
                                   value="{{ old('name') }}"/>
                            @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                        </div>
                        <div class="form-group  @if ($errors->has('email')) has-error @endif">
                            <label class="control-label requiredField" for="email">
                                Email
                            </label>
                            <input class="form-control" id="email" name="email" type="text"
                                   value="{{ old('email') }}"/>
                            @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                        </div>
                        <div class="form-group  @if ($errors->has('role')) has-error @endif">
                            <label class="control-label " for="role">
                                Select a Role
                            </label>
                            <select class="select form-control" id="role" name="role">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('role')) <p class="help-block">{{ $errors->first('role') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('name')) has-error @endif">
                            <div>
                                <button class="btn btn-primary " name="submit" type="submit">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Manage Users</h3>
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
@endsection
