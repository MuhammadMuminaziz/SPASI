<x-app-layout>

    @push('css-library')
    <link rel="stylesheet" href="{{ asset('library/selectric/selectric.css') }}">
    @endpush

    <section class="section">
        <div class="section-header">
            <h1>Usulan PNS</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('usulan-pns.index') }}">Usulan PNS</a></div>
                <div class="breadcrumb-item active">Buat Usulan PNS</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Buat Usulan PNS</h4>
                        </div>
                        
                        <div class="card-body">
                            <div class="border border-1 p-3 mb-5">
                                <table class="w-100">
                                    <tr>
                                        <td>Jabatan</td>
                                        <td>:</td>
                                        <td class="text-primary">{{ $pns->jabatan->name ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Nama</td>
                                        <td width="10px">:</td>
                                        <td class="text-primary">{{ $pns->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Pangkat</td>
                                        <td>:</td>
                                        <td class="text-primary">{{ $pns->pangkat }}</td>
                                    </tr>
                                    <tr>
                                        <td>NIP</td>
                                        <td>:</td>
                                        <td class="text-primary">{{ $pns->nip }}</td>
                                    </tr>
                                </table>
                            </div>
                            <form action="{{ route('usulan-pns.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="pns_id" value="{{ $pns->id }}">
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-uppercase">Data Perorangan Calon Penerima Pensiun (DPCP)</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('dpcp') is-invalid @enderror" name="dpcp" id="dpcp">
                                                <label class="custom-file-label overflow-hidden" for="dpcp">Choose file</label>
                                                @error('dpcp')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">SK/KEP cpns</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('kep_cpns') is-invalid @enderror" name="kep_cpns" id="kep_cpns">
                                                <label class="custom-file-label overflow-hidden" for="kep_cpns">Choose file</label>
                                                @error('kep_cpns')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">SK/KEP pns</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('kep_pns') is-invalid @enderror" name="kep_pns" id="kep_pns">
                                                <label class="custom-file-label overflow-hidden" for="kep_pns">Choose file</label>
                                                @error('kep_pns')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">SK/KEP Kenaikan Pangkat Terakhir</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('kep_pangkat') is-invalid @enderror" name="kep_pangkat" id="kep_pangkat">
                                                <label class="custom-file-label overflow-hidden" for="kep_pangkat">Choose file</label>
                                                @error('kep_pangkat')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">Akta Nikah/Cerai</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('akte_nikah') is-invalid @enderror" name="akte_nikah" id="akte_nikah">
                                                <label class="custom-file-label overflow-hidden" for="akte_nikah">Choose file</label>
                                                @error('akte_nikah')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">Akta kelahiran Anak</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('akte_anak') is-invalid @enderror" name="akte_anak" id="akte_anak">
                                                <label class="custom-file-label overflow-hidden" for="akte_anak">Choose file</label>
                                                @error('akte_anak')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-uppercase">SP. HD/SP. PIDANA</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('sp_hd') is-invalid @enderror" name="sp_hd" id="sp_hd">
                                                <label class="custom-file-label overflow-hidden" for="sp_hd">Choose file</label>
                                                @error('sp_hd')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">Surat keterangan Kematian</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('sk_kematian') is-invalid @enderror" name="sk_kematian" id="sk_kematian">
                                                <label class="custom-file-label overflow-hidden" for="sk_kematian">Choose file</label>
                                                @error('sk_kematian')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">Kartu Keluarga (KK)</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('kk') is-invalid @enderror" name="kk" id="kk">
                                                <label class="custom-file-label overflow-hidden" for="kk">Choose file</label>
                                                @error('kk')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">Kenaikan Gaji Berkala (KGB)</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('kgb') is-invalid @enderror" name="kgb" id="kgb">
                                                <label class="custom-file-label overflow-hidden" for="kgb">Choose file</label>
                                                @error('kgb')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">Penilaian Prestasi Kerja 1 Tahun Terakhir (PPK)</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('ppk') is-invalid @enderror" name="ppk" id="ppk">
                                                <label class="custom-file-label overflow-hidden" for="ppk">Choose file</label>
                                                @error('ppk')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <ol class="small mb-5" style="line-height: 150%">
                                    <li>SP. HD adalah surat pernyataan tidak pernah dijatuhi hukuman displin selama 1 tahun terakhir.</li>
                                    <li>SP. PIDANA adalah surat pernyataan tidak sedang menjalani Proses Pidana.</li>
                                    <li>Surat Kematian dari suami/istri yang dibuat oleh kelurahan/desa/kecamatan.</li>
                                </ol>
                                <div class="d-flex justify-content-end" style="gap: 5px">
                                    <a href="{{ route('usulan-pns.index') }}" class="btn btn-secondary">Kembali</a>
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
