@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="col-md-6 col-md-offset-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Editing</h3>
                </div>
                <div class="panel-body">
                    <form method="post" action="{{ route('admin.users.update', $user->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group ">
                            <label class="control-label " for="name">
                                Name
                            </label>
                            <input class="form-control" id="name" name="name" type="text" value="{{ $user->name }}"/>
                        </div>
                        <div class="form-group ">
                            <label class="control-label requiredField" for="email">
                                Email
                            </label>
                            <input class="form-control" id="email" name="email" type="text" value="{{ $user->email }}"/>
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="role">
                                Select a Role
                            </label>
                            <select class="select form-control" id="role" name="role"
                                    value="{{ $user->roles()->first()->id }}">
                                @foreach(\Spatie\Permission\Models\Role::all() as $role)
                                    <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="is_active">
                                Enabled
                            </label>
                            <select class="select form-control" id="is_active" name="is_active">
                                <option value="0">Yes</option>
                                <option value="1">No</option>
                            </select>
                        </div>
                        <div class="form-group">
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
    </div>
@endsection
