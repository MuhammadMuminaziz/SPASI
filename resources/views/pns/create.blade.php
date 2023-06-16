<x-app-layout>

    @push('css-library')
    <link rel="stylesheet" href="{{ asset('library/selectric/selectric.css') }}">
    @endpush

    <section class="section">
        <div class="section-header">
            <h1>Data PNS</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('pns.index') }}">Data PNS</a></div>
                <div class="breadcrumb-item active">Tambah Data PNS</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Tambah Data PNS</h4>
                        </div>
                        
                        <div class="card-body">
                            <form action="{{ route('pns.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jabatan <span class="text-danger">*</span></label>
                                            <select class="form-control selectric" name="jabatan_id" {{ $jabatan->count() < 1 ? 'disabled' : '' }}>
                                                @if($jabatan->count() > 0)
                                                    @foreach($jabatan->where('type', 'PNS') as $row)
                                                    <option value="{{ $row->id }}" {{ $row->id == old('jabatan_id') ? 'selected' : '' }}>{{ $row->name }}</option>
                                                    @endforeach
                                                @else
                                                <option value="">Jabatan belum tersedia</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>NIP <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control @error('nip') is-invalid @enderror" name="nip" placeholder="masukan nama golongan jabatan" value="{{ old('nip') }}">
                                            @error('nip')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Lengkap <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="masukan nama lengkap" value="{{ old('nama') }}">
                                            @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Pangkat/Golongan <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('pangkat') is-invalid @enderror" name="pangkat" placeholder="masukan pangkat" value="{{ old('pangkat') }}">
                                            @error('pangkat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>DIKUM <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('dikum') is-invalid @enderror" name="dikum" placeholder="masukan dikum" value="{{ old('dikum') }}">
                                            @error('dikum')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Lulus Dikum <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control @error('lulus_dikum') is-invalid @enderror" name="lulus_dikum" placeholder="ex: 2010" value="{{ old('lulus_dikum') }}">
                                            @error('lulus_dikum')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal Lahir <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" placeholder="masukan tgl_lahir/diksus" value="{{ old('tgl_lahir') }}">
                                            @error('tgl_lahir')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>DIKJANG/DIKSUS <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('dikjang') is-invalid @enderror" name="dikjang" placeholder="masukan dikjang/diksus" value="{{ old('dikjang') }}">
                                            @error('dikjang')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Lulus DIKJANG/DIKSUS <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control @error('lulus_dikjang') is-invalid @enderror" name="lulus_dikjang" placeholder="ex: 2010" value="{{ old('lulus_dikjang') }}">
                                            @error('lulus_dikjang')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>No Kep/Sprint Jab TMT <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('kep_jab') is-invalid @enderror" name="kep_jab" placeholder="masukan No Kep/Sprint Jab TMT" value="{{ old('kep_jab') }}">
                                            @error('kep_jab')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal No Kep/Sprint Jab TMT <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control @error('tgl_kep_jab') is-invalid @enderror" name="tgl_kep_jab" placeholder="masukan tgl_kep_jab" value="{{ old('tgl_kep_jab') }}">
                                            @error('tgl_kep_jab')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end" style="gap: 5px">
                                    <a href="{{ route('pns.index') }}" class="btn btn-secondary">Kembali</a>
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
    
</x-app-layout>
