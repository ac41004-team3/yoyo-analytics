@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Editing</h3>
                </div>
                <div class="panel-body">
                    <form method="post" action="{{ route('admin.users.update', $user->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group  @if ($errors->has('name')) has-error @endif">
                            <label class="control-label " for="name">
                                Name
                            </label>
                            <input class="form-control" id="name" name="name" type="text"
                                   value="{{ old('name', $user->name) }}"/>
                            @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                        </div>
                        <div class="form-group  @if ($errors->has('email')) has-error @endif">
                            <label class="control-label requiredField" for="email">
                                Email
                            </label>
                            <input class="form-control" id="email" name="email" type="text"
                                   value="{{ old('email', $user->email) }}"/>
                            @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                        </div>
                        <div class="form-group  @if ($errors->has('role')) has-error @endif">
                            <label class="control-label " for="role">
                                Select a Role
                            </label>
                            <select class="select form-control" id="role" name="role"
                                    value="{{ $user->roles()->first()->id }}">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('role')) <p class="help-block">{{ $errors->first('role') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('name')) has-error @endif">
                            <div>
                                <button class="btn btn-primary" name="submit" type="submit">
                                    Save
                                </button>
                                <delete-button action="{{ route('admin.users.destroy', $user->id) }}" inline-template>
                                    <div class="btn btn-danger" name="delete" @click="prompt">
                                        Delete
                                    </div>
                                </delete-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <outlet-select :outlets="{{ \App\Outlet::all() }}" :already="{{ $user->outlets()->get() }}"
                           action="{{ route('admin.users.outlets', $user->id) }}"></outlet-select>
        </div>
    </div>
@endsection
