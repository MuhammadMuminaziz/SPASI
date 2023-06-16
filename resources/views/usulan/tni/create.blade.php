<x-app-layout>

    @push('css-library')
    <link rel="stylesheet" href="{{ asset('library/selectric/selectric.css') }}">
    @endpush

    <section class="section">
        <div class="section-header">
            <h1>Usulan TNI</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('usulan-tni.index') }}">Usulan TNI</a></div>
                <div class="breadcrumb-item active">Buat Usulan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Buat Usulan TNI</h4>
                        </div>
                        
                        <div class="card-body">
                            <div class="border border-1 p-3 mb-5">
                                <table class="w-100">
                                    <tr>
                                        <td width="30%">Nama</td>
                                        <td width="10px">:</td>
                                        <td class="text-primary">{{ $tni->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Pangkat</td>
                                        <td>:</td>
                                        <td class="text-primary">{{ $tni->pangkat }}</td>
                                    </tr>
                                    <tr>
                                        <td>NRP</td>
                                        <td>:</td>
                                        <td class="text-primary">{{ $tni->nrp }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td class="text-primary">{{ $tni->status }}</td>
                                    </tr>
                                </table>
                            </div>
                            <form action="{{ route('usulan-tni.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="tni_id" value="{{ $tni->id }}">
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-uppercase">FOTOKOPI SKEP Pengangkatan Pertama Dilegalisir Pejabat PERS</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('skep_pengangkatan') is-invalid @enderror" name="skep_pengangkatan" id="skep_pengangkatan">
                                                <label class="custom-file-label overflow-hidden" for="skep_pengangkatan">Choose file</label>
                                                @error('skep_pengangkatan')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">FOTOKOPI SKEP pangkat terakhir dilegalisir Pejabat pers</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('skep_pangkat') is-invalid @enderror" name="skep_pangkat" id="skep_pangkat">
                                                <label class="custom-file-label overflow-hidden" for="skep_pangkat">Choose file</label>
                                                @error('skep_pangkat')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">FOTOKOPI SKEP pemberhentian dengan hormat Dilegalisir Pejabat PERS</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('skep_pemberhentian') is-invalid @enderror" name="skep_pemberhentian" id="skep_pemberhentian">
                                                <label class="custom-file-label overflow-hidden" for="skep_pemberhentian">Choose file</label>
                                                @error('skep_pemberhentian')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">DCPP</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('dcpp') is-invalid @enderror" name="dcpp" id="dcpp">
                                                <label class="custom-file-label overflow-hidden" for="dcpp">Choose file</label>
                                                @error('dcpp')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">FOTOKOPI Surat nikah Dilegalisir Pejabat PERS</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('srt_nikah') is-invalid @enderror" name="srt_nikah" id="srt_nikah">
                                                <label class="custom-file-label overflow-hidden" for="srt_nikah">Choose file</label>
                                                @error('srt_nikah')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">FOTOKOPI SKEP Milsuk yang berasal dari milwa Dilegalisir Pejabat PERS</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('skep_milsuk') is-invalid @enderror" name="skep_milsuk" id="skep_milsuk">
                                                <label class="custom-file-label overflow-hidden" for="skep_milsuk">Choose file</label>
                                                @error('skep_milsuk')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">FOTOKOPI KPI Dilegalisir Pejabat PERS</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('kpi') is-invalid @enderror" name="kpi" id="kpi">
                                                <label class="custom-file-label overflow-hidden" for="kpi">Choose file</label>
                                                @error('kpi')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-uppercase">FOTOKOPI Akte kelahiran anak yang belum dewasa</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('akte') is-invalid @enderror" name="akte" id="akte">
                                                <label class="custom-file-label overflow-hidden" for="akte">Choose file</label>
                                                @error('akte')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">Pas foto warna terbaru ukuran 4x6 ybs dan istri latar biru (foto tidak boleh di scan, tidak pake kacamata dan jilbab)</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" name="photo" id="photo">
                                                <label class="custom-file-label overflow-hidden" for="photo">Choose file</label>
                                                @error('photo')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">surat keterangan tanggungan keluarga bentuk ku1</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('sk_tanggungan_keluarga') is-invalid @enderror" name="sk_tanggungan_keluarga" id="sk_tanggungan_keluarga">
                                                <label class="custom-file-label overflow-hidden" for="sk_tanggungan_keluarga">Choose file</label>
                                                @error('sk_tanggungan_keluarga')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">FOTOKOPI kta asabri</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('kta_asabri') is-invalid @enderror" name="kta_asabri" id="kta_asabri">
                                                <label class="custom-file-label overflow-hidden" for="kta_asabri">Choose file</label>
                                                @error('kta_asabri')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">FOTOKOPI npwp</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('npwp') is-invalid @enderror" name="npwp" id="npwp">
                                                <label class="custom-file-label overflow-hidden" for="npwp">Choose file</label>
                                                @error('npwp')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">FOTOKOPI Tanda jasa berupa bintang yang dimiliki</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('tanda_jasa') is-invalid @enderror" name="tanda_jasa" id="tanda_jasa">
                                                <label class="custom-file-label overflow-hidden" for="tanda_jasa">Choose file</label>
                                                @error('tanda_jasa')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">Surat keterangan kuliah bagi anak yang berumur < 22 tahun</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('sk_kuliah') is-invalid @enderror" name="sk_kuliah" id="sk_kuliah">
                                                <label class="custom-file-label overflow-hidden" for="sk_kuliah">Choose file</label>
                                                @error('sk_kuliah')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end" style="gap: 5px">
                                    <a href="{{ route('usulan-tni.index') }}" class="btn btn-secondary">Kembali</a>
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
