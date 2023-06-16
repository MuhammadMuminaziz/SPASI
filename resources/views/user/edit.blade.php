<x-app-layout>

    @push('css-library')
    <link rel="stylesheet" href="{{ asset('library/selectric/selectric.css') }}">
    @endpush

    <section class="section">
        <div class="section-header">
            <h1>User Managemen</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('users.index') }}">User Managemen</a></div>
                <div class="breadcrumb-item active">Edit User</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-10">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Edit User</h4>
                        </div>
                        
                        <div class="card-body">
                            <form action="{{ route('users.update', $user) }}" method="post" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label>Nama User <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="masukan nama user" value="{{ old('name', $user->name) }}">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Username <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="masukan username" value="{{ old('username', $user->username) }}">
                                    @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <small class="form-text text-muted @error('username') d-none @enderror">
                                        Username tidak boleh mengandung huruf kapital, spasi, karakter khusus, atau emoji.
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label>Role <span class="text-danger">*</span></label>
                                    <select class="form-control selectric" id="role" name="role_id">
                                        @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ $role->id == old('role_id', $user->role_id) ? 'selected' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="control-label">Status</div>
                                    <div class="custom-switches-stacked mt-2">
                                        <label class="custom-switch">
                                            <input type="radio" name="status" value="Aktif" class="custom-switch-input" {{ $user->is_active == 1 ? 'checked' : '' }}>
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Aktif</span>
                                        </label>
                                        <label class="custom-switch">
                                            <input type="radio" name="status" value="Tidak Aktif" class="custom-switch-input" {{ $user->is_active == 0 ? 'checked' : '' }}>
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Tidak Aktif</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group {{ $user->role_id == 3 ? '' : 'd-none' }}" id="kesatuan">
                                    <label>Kesatuan <span class="text-danger">*</span></label>
                                    <select class="form-control selectric" name="kesatuan_id">
                                        <option value="{{ $user->kesatuan->id }}" {{ $user->kesatuan->id == old('kesatuan_id', $user->kesatuan->id) ? 'selected' : '' }}>{{ $user->kesatuan->name }}</option>
                                        @foreach($kesatuan as $row)
                                        <option value="{{ $row->id }}" {{ $row->id == old('kesatuan_id', $user->kesatuan->id) ? 'selected' : '' }}>{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <small class="form-text text-muted mb-0">
                                    Kosongkan form password jika tidak diubah
                                </small><hr class="mt-0">
                                <div class="form-row mb-5">
                                    <div class="form-group col-md-6">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="password" name="password">
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="password_confirmation">Konfirmasi Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation" placeholder="password_confirmation" name="password_confirmation">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end" style="gap: 5px">
                                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
                                    <button class="btn btn-primary" type="submit">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('js-library')
    <script src="{{ asset('library/selectric/jquery.selectric.min.js') }}"></script>
    @endpush

    @push('js')
        <script>
            $('#role').on('change', function(){
                let val = $(this).val();
                if(val==3){
                    $('#kesatuan').removeClass('d-none');
                }else{
                    $('#kesatuan').addClass('d-none');
                }
            })
        </script>
    @endpush
</x-app-layout>
