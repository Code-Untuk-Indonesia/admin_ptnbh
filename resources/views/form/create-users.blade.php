@extends('admin-template.navbar-footer')

@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">{{ isset($user) ? 'Edit User' : 'Tambah User' }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="col-12 col-md-12">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-body">
                        <form class="settings-form" id="formUser" name="formUser" method="POST"
                            enctype="multipart/form-data"
                            action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}">
                            @csrf
                            @if (isset($user))
                                @method('PUT')
                            @endif

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $user->name ?? '' }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $user->email ?? '' }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password"
                                        {{ isset($user) ? '' : 'required' }}>
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="bi bi-eye-slash" id="passwordIcon"></i>
                                    </button>
                                </div>
                                @if (isset($user))
                                    <small class="form-text text-muted">Leave blank if you don't want to change the
                                        password</small>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" {{ isset($user) ? '' : 'required' }}>
                            </div>

                            <div class="mb-3">
                                <label for="roles" class="form-label">Roles</label>
                                <select class="form-control" id="roles" name="roles[]" multiple="multiple" required>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role }}"
                                            {{ isset($user) && in_array($role, $userRoles) ? 'selected' : '' }}>
                                            {{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <input type="hidden" id="userId" name="id" value="{{ isset($user) ? $user->id : '' }}">

                            <button type="submit" class="btn app-btn-primary"
                                id="saveBtn">{{ isset($user) ? 'Update User' : 'Tambah User' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function(e) {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('passwordIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.classList.remove('bi-eye-slash');
                passwordIcon.classList.add('bi-eye');
            } else {
                passwordInput.type = 'password';
                passwordIcon.classList.remove('bi-eye');
                passwordIcon.classList.add('bi-eye-slash');
            }
        });

        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Gagal Menyimpan User!!',
                text: '{{ $errors->first() }}',
                onClose: () => {
                    location.reload();
                }
            });
        @endif
    </script>
@endsection
