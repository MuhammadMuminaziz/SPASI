<x-app-layout>

    @push('css-library')
    <link rel="stylesheet" href="{{ asset('library/selectric/selectric.css') }}">
    @endpush

    <section class="section">
        <div class="section-header">
            <h1>Usulan TNI</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('usulan-tni.index') }}">Usulan TNI</a></div>
                <div class="breadcrumb-item active">Verifikasi Usulan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Verifikasi Usulan TNI</h4>
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
                            <form action="{{ route('usulan-tni.verify-usulan') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="usulan_tni_id" value="{{ $usulan->id }}">
                                <div class="row mb-5">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="text-uppercase">FOTOKOPI SKEP Pengangkatan Pertama Dilegalisir Pejabat PERS</label>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <a href="/uploads/tni/{{ $usulan->skep_pengangkatan }}" target="blank"><i class="fas fa-file-pdf"></i> {{ $usulan->skep_pengangkatan }}</a>
                                                <div>
                                                    <span class="btn btn-sm btn-primary terima">Terima</span>
                                                    <span class="btn btn-sm btn-danger tolak">Tolak</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control d-none" placeholder="catatan" name="note_skep_pengangkatan">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">FOTOKOPI SKEP pangkat terakhir dilegalisir Pejabat pers</label>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <a href="/uploads/tni/{{ $usulan->skep_pangkat }}" target="blank"><i class="fas fa-file-pdf"></i> {{ $usulan->skep_pangkat }}</a>
                                                <div>
                                                    <span class="btn btn-sm btn-primary terima">Terima</span>
                                                    <span class="btn btn-sm btn-danger tolak">Tolak</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control d-none" placeholder="catatan" name="note_skep_pangkat">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">FOTOKOPI SKEP pemberhentian dengan hormat Dilegalisir Pejabat PERS</label>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <a href="/uploads/tni/{{ $usulan->skep_pemberhentian }}" target="blank"><i class="fas fa-file-pdf"></i> {{ $usulan->skep_pemberhentian }}</a>
                                                <div>
                                                    <span class="btn btn-sm btn-primary terima">Terima</span>
                                                    <span class="btn btn-sm btn-danger tolak">Tolak</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control d-none" placeholder="catatan" name="note_skep_pemberhentian">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">DCPP</label>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <a href="/uploads/tni/{{ $usulan->dcpp }}" target="blank"><i class="fas fa-file-pdf"></i> {{ $usulan->dcpp }}</a>
                                                <div>
                                                    <span class="btn btn-sm btn-primary terima">Terima</span>
                                                    <span class="btn btn-sm btn-danger tolak">Tolak</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control d-none" placeholder="catatan" name="note_dcpp">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">FOTOKOPI Surat nikah Dilegalisir Pejabat PERS</label>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <a href="/uploads/tni/{{ $usulan->srt_nikah }}" target="blank"><i class="fas fa-file-pdf"></i> {{ $usulan->srt_nikah }}</a>
                                                <div>
                                                    <span class="btn btn-sm btn-primary terima">Terima</span>
                                                    <span class="btn btn-sm btn-danger tolak">Tolak</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control d-none" placeholder="catatan" name="note_srt_nikah">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">FOTOKOPI SKEP Milsuk yang berasal dari milwa Dilegalisir Pejabat PERS</label>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <a href="/uploads/tni/{{ $usulan->skep_milsuk }}" target="blank"><i class="fas fa-file-pdf"></i> {{ $usulan->skep_milsuk }}</a>
                                                <div>
                                                    <span class="btn btn-sm btn-primary terima">Terima</span>
                                                    <span class="btn btn-sm btn-danger tolak">Tolak</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control d-none" placeholder="catatan" name="note_skep_milsuk">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">FOTOKOPI KPI Dilegalisir Pejabat PERS</label>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <a href="/uploads/tni/{{ $usulan->kpi }}" target="blank"><i class="fas fa-file-pdf"></i> {{ $usulan->kpi }}</a>
                                                <div>
                                                    <span class="btn btn-sm btn-primary terima">Terima</span>
                                                    <span class="btn btn-sm btn-danger tolak">Tolak</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control d-none" placeholder="catatan" name="note_kpi">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="text-uppercase">FOTOKOPI Akte kelahiran anak yang belum dewasa</label>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <a href="/uploads/tni/{{ $usulan->akte }}" target="blank"><i class="fas fa-file-pdf"></i> {{ $usulan->akte }}</a>
                                                <div>
                                                    <span class="btn btn-sm btn-primary terima">Terima</span>
                                                    <span class="btn btn-sm btn-danger tolak">Tolak</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control d-none" placeholder="catatan" name="note_akte">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">Pas foto warna terbaru ukuran 4x6 ybs dan istri latar biru (foto tidak boleh di scan, tidak pake kacamata dan jilbab)</label>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <a href="/uploads/tni/{{ $usulan->photo }}" target="blank"><i class="fas fa-file-pdf"></i> {{ $usulan->photo }}</a>
                                                <div>
                                                    <span class="btn btn-sm btn-primary terima">Terima</span>
                                                    <span class="btn btn-sm btn-danger tolak">Tolak</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control d-none" placeholder="catatan" name="note_photo">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">surat keterangan tanggungan keluarga bentuk ku1</label>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <a href="/uploads/tni/{{ $usulan->sk_tanggungan_keluarga }}" target="blank"><i class="fas fa-file-pdf"></i> {{ $usulan->sk_tanggungan_keluarga }}</a>
                                                <div>
                                                    <span class="btn btn-sm btn-primary terima">Terima</span>
                                                    <span class="btn btn-sm btn-danger tolak">Tolak</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control d-none" placeholder="catatan" name="note_sk_tanggungan_keluarga">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">FOTOKOPI kta asabri</label>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <a href="/uploads/tni/{{ $usulan->kta_asabri }}" target="blank"><i class="fas fa-file-pdf"></i> {{ $usulan->kta_asabri }}</a>
                                                <div>
                                                    <span class="btn btn-sm btn-primary terima">Terima</span>
                                                    <span class="btn btn-sm btn-danger tolak">Tolak</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control d-none" placeholder="catatan" name="note_kta_asabri">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">FOTOKOPI npwp</label>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <a href="/uploads/tni/{{ $usulan->npwp }}" target="blank"><i class="fas fa-file-pdf"></i> {{ $usulan->npwp }}</a>
                                                <div>
                                                    <span class="btn btn-sm btn-primary terima">Terima</span>
                                                    <span class="btn btn-sm btn-danger tolak">Tolak</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control d-none" placeholder="catatan" name="note_npwp">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">FOTOKOPI Tanda jasa berupa bintang yang dimiliki</label>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <a href="/uploads/tni/{{ $usulan->tanda_jasa }}" target="blank"><i class="fas fa-file-pdf"></i> {{ $usulan->tanda_jasa }}</a>
                                                <div>
                                                    <span class="btn btn-sm btn-primary terima">Terima</span>
                                                    <span class="btn btn-sm btn-danger tolak">Tolak</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control d-none" placeholder="catatan" name="note_tanda_jasa">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">Surat keterangan kuliah bagi anak yang berumur < 22 tahun</label>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <a href="/uploads/tni/{{ $usulan->sk_kuliah }}" target="blank"><i class="fas fa-file-pdf"></i> {{ $usulan->sk_kuliah }}</a>
                                                <div>
                                                    <span class="btn btn-sm btn-primary terima">Terima</span>
                                                    <span class="btn btn-sm btn-danger tolak">Tolak</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control d-none" placeholder="catatan" name="note_sk_kuliah">
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

    @push('js')
    <script>
        $('.tolak').click(function(){
            $(this).parent().parent().next().removeClass('d-none');
        })

        $('.terima').click(function(){
            $(this).parent().parent().next().addClass('d-none');
            $(this).parent().parent().next().val('');
        })
    </script>
    @endpush
</x-app-layout>
