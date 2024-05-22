@extends('admin-template.navbar-footer')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ isset($role) ? 'Edit Role' : 'Create Role' }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ isset($role) ? route('roles.update', $role->id) : route('roles.store') }}">
                            @csrf
                            @if(isset($role))
                                @method('PUT')
                            @endif

                            <div class="form-group">
                                <label for="name">Role Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ isset($role) ? $role->name : '' }}" required>
                            </div>

                            <div class="form-group">
                                <label for="permissions">Permissions:</label>
                                <div class="checkbox-group">
                                    @foreach($permissions as $permission)
                                        @if($permission->exists)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                                    {{ isset($role) && in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="permission">{{ $permission->name }}</label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">{{ isset($role) ? 'Update Role' : 'Create Role' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
