<x-app-layout>

    <section class="section">
        <div class="section-header">
            <h1>User Managemen</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('users.index') }}">User Managemen</a></div>
                <div class="breadcrumb-item active">{{ $user->username }}</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-10">
                    <div class="card card-primary">
                        <div class="card-body">
                            <p class="mb-0 small">Nama User</p>
                            <p class="text-dark">{{ $user->name }}</p><hr>
                            <p class="mb-0 small">Username</p>
                            <p class="text-dark">{{ $user->username }}</p><hr>
                            <p class="mb-0 small">Email</p>
                            <p class="text-dark">{{ $user->email }}</p><hr>
                            <p class="mb-0 small">Role</p>
                            <p class="text-dark">{{ $user->role->name }}</p><hr>
                            <div class="d-flex justify-content-end mt-5" style="gap: 4px">
                                <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
                                <a href="{{ route('users.index') }}" class="btn btn-primary" id="change-password-admin">Ubah Password</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <form action="{{ route('change.pass.admin') }}" method="post" id="page-change-password-admin">
        {{-- @csrf --}}
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control password" name="password" id="password" placeholder="masukan password baru">
            <div class="invalid-feedback messErr_password"></div>
        </div>
        <div class="form-group">
            <label>Konfirmasi Password</label>
            <input type="password" class="form-control password" name="password_confirmation" id="password_confirmation" placeholder="konfirmasi password">
            <input type="hidden" name="username" id="username" value="{{ $user->username }}">
        </div>
        {{-- <div class="d-flex justify-content-end">
            <button class="btn btn-primary" type="submit">Ubah</button>
        </div> --}}
    </form>
</x-app-layout>
