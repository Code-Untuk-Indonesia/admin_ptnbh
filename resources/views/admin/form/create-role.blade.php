@extends('admin-template.navbar-footer')

@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">{{ isset($role) ? 'Edit Role' : 'Tambah Role' }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-12 col-md-12">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form class="settings-form" method="POST" action="{{ isset($role) ? route('roles.update', $role->id) : route('roles.store') }}">
                        @csrf
                        @if(isset($role))
                        @method('PUT')
                        @endif

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Role</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', isset($role) ? $role->name : '') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="permissions">Permissions:</label>
                            <div class="checkbox-group">
                                @foreach($permissions as $permission)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}" {{ isset($role) && in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="permission{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <input type="hidden" id="roleId" name="id" value="{{ isset($role) ? $role->id : '' }}">

                        <button type="submit" class="btn app-btn-primary" id="saveBtn">{{ isset($role) ? 'Update Role' : 'Tambah Role' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    @if($errors->any())
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: '{{ $errors->first() }}',
        onClose: () => {
            location.reload();
        }
    });
    @endif
</script>
@endsection
