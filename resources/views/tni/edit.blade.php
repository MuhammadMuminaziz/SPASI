<x-app-layout>

    @push('css-library')
    <link rel="stylesheet" href="{{ asset('library/selectric/selectric.css') }}">
    @endpush

    <section class="section">
        <div class="section-header">
            <h1>Data TNI</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('tni.index') }}">Data TNI</a></div>
                <div class="breadcrumb-item active">Tambah Data TNI</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Tambah Data TNI</h4>
                        </div>
                        
                        <div class="card-body">
                            <form action="{{ route('tni.update', $tni) }}" method="post" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Data</p>
                                        <div class="form-group">
                                            <label>Kesatuan <span class="text-danger">*</span></label>
                                            <select class="form-control selectric" name="kesatuan_id">
                                                <option value="{{ auth()->user()->kesatuan_id }}">{{ auth()->user()->kesatuan->name }}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jabatan <span class="text-danger">*</span></label>
                                            <select class="form-control selectric" name="jabatan_id" {{ $jabatan->count() < 1 ? 'disabled' : '' }}>
                                                @if($jabatan->count() > 0)
                                                    @foreach($jabatan as $row)
                                                    <option value="{{ $row->id }}" {{ $row->id == old('jabatan_id', $tni->jabatan_id) ? 'selected' : '' }}>{{ $row->name }}</option>
                                                    @endforeach
                                                @else
                                                <option value="">Jabatan belum tersedia</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Gol Jabatan <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('gol_jab') is-invalid @enderror" name="gol_jab" placeholder="masukan nama golongan jabatan" value="{{ old('gol_jab', $tni->gol_jab) }}">
                                            @error('gol_jab')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Status <span class="text-danger">*</span></label>
                                            <select class="form-control selectric" name="status">
                                                <option value="Perwira" {{ $tni->status == 'Perwira' ? 'selected' : '' }}>Perwira</option>
                                                <option value="Non Perwira" {{ $tni->status == 'Non Perwira' ? 'selected' : '' }}>Non Perwira</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="masukan nama TNI" value="{{ old('nama', $tni->nama) }}">
                                            @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Pangkat <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('pangkat') is-invalid @enderror" name="pangkat" placeholder="masukan pangkat" value="{{ old('pangkat', $tni->pangkat) }}">
                                            @error('pangkat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>KORPS <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('korps') is-invalid @enderror" name="korps" placeholder="masukan korps" value="{{ old('korps', $tni->korps) }}">
                                            @error('korps')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>NRP <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control @error('nrp') is-invalid @enderror" name="nrp" placeholder="masukan nrp" value="{{ old('nrp', $tni->nrp) }}">
                                            @error('nrp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Lahir <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" placeholder="masukan tgl_lahir" value="{{ old('tgl_lahir', date('Y-m-d', strtotime($tni->tgl_lahir))) }}">
                                            @error('tgl_lahir')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Sumber <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('sumber') is-invalid @enderror" name="sumber" placeholder="masukan sumber" value="{{ old('sumber', $tni->sumber) }}">
                                            @error('sumber')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <p>TMT</p>
                                        <div class="form-group">
                                            <label>Tanggal TMT TNI <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control @error('tmt_tni') is-invalid @enderror" name="tmt_tni" placeholder="masukan tmt_tni" value="{{ old('tmt_tni', date('Y-m-d', strtotime($tni->tmt_tni))) }}">
                                            @error('tmt_tni')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal TMT Pangkat <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control @error('tmt_pangkat') is-invalid @enderror" name="tmt_pangkat" placeholder="masukan tmt_pangkat" value="{{ old('tmt_pangkat', date('Y-m-d', strtotime($tni->tmt_pangkat))) }}">
                                            @error('tmt_pangkat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal TMT Jabatan <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control @error('tmt_jabatan') is-invalid @enderror" name="tmt_jabatan" placeholder="masukan tmt_jabatan" value="{{ old('tmt_jabatan', date('Y-m-d', strtotime($tni->tmt_jabatan))) }}">
                                            @error('tmt_jabatan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>TMT Lama <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('tmt_lama') is-invalid @enderror" name="tmt_lama" placeholder="masukan TMT lama" value="{{ old('tmt_lama', $tni->tmt_lama) }}">
                                            @error('tmt_lama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal TMT di Kodam XVI/PTM <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control @error('tmt_kodam') is-invalid @enderror" name="tmt_kodam" placeholder="masukan tmt_kodam" value="{{ old('tmt_kodam', date('Y-m-d', strtotime($tni->tmt_kodam))) }}">
                                            @error('tmt_kodam')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <p>Realisasi KEP/SPRIN</p>
                                        <div class="form-group">
                                            <label>Kep KASAD <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('kep_kasad') is-invalid @enderror" name="kep_kasad" placeholder="masukan kep kasad" value="{{ old('kep_kasad', $tni->kep_kasad) }}">
                                            @error('kep_kasad')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Kep KASAD/SP Pangam <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('kep_pangam') is-invalid @enderror" name="kep_pangam" placeholder="masukan kep KASAD/SP Pangam" value="{{ old('kep_pangam', $tni->kep_pangam) }}">
                                            @error('kep_pangam')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>DIKUM <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('dikum') is-invalid @enderror" name="dikum" placeholder="masukan dikum" value="{{ old('dikum', $tni->dikum) }}">
                                            @error('dikum')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Lulus DIKUM <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control @error('lulus_dikum') is-invalid @enderror" name="lulus_dikum" placeholder="masukan lulus_dikum" value="{{ old('lulus_dikum', $tni->lulus_dikum) }}">
                                            @error('lulus_dikum')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>DIKBANGUM <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('dikbangum') is-invalid @enderror" name="dikbangum" placeholder="masukan dikbangum" value="{{ old('dikbangum', $tni->dikbangum) }}">
                                            @error('dikbangum')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Lulus DIKBANGUM <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control @error('lulus_dikbangum') is-invalid @enderror" name="lulus_dikbangum" placeholder="masukan lulus_dikbangum" value="{{ old('lulus_dikbangum', $tni->lulus_dikbangum) }}">
                                            @error('lulus_dikbangum')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end" style="gap: 5px">
                                    <a href="{{ route('tni.index') }}" class="btn btn-secondary">Kembali</a>
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
    
</x-app-layout>
