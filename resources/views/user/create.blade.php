<x-app-layout>

    @push('css-library')
    <link rel="stylesheet" href="{{ asset('library/selectric/selectric.css') }}">
    @endpush

    <section class="section">
        <div class="section-header">
            <h1>User Managemen</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('users.index') }}">User Managemen</a></div>
                <div class="breadcrumb-item active">Tambah User</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-10">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Tambah User</h4>
                        </div>
                        
                        <div class="card-body">
                            <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Nama User <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="masukan nama user" value="{{ old('name') }}">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Username <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="masukan username" value="{{ old('username') }}">
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
                                        <option value="{{ $role->id }}" {{ $role->id == old('role_id') ? 'selected' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group d-none" id="kesatuan">
                                    <label>Kesatuan <span class="text-danger">*</span></label>
                                    <select class="form-control selectric" name="kesatuan_id" {{ $kesatuan->count() < 1 ? 'disabled' : '' }}>
                                        @if($kesatuan->count() > 0)
                                            @foreach($kesatuan as $row)
                                            <option value="{{ $row->id }}" {{ $row->id == old('kesatuan_id') ? 'selected' : '' }}>{{ $row->name }}</option>
                                            @endforeach
                                        @else
                                        <option value="">Kesatuan belum tersedia</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="form-row mb-5">
                                    <div class="form-group col-md-6">
                                        <label for="password">Password <span class="text-danger">*</span></label>
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
                                    <button class="btn btn-primary" type="submit">Simpan</button>
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
