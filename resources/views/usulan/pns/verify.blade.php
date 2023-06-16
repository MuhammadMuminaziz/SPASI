<x-app-layout>

    @push('css-library')
    <link rel="stylesheet" href="{{ asset('library/selectric/selectric.css') }}">
    @endpush

    <section class="section">
        <div class="section-header">
            <h1>Usulan PNS</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('usulan-pns.index') }}">Usulan PNS</a></div>
                <div class="breadcrumb-item active">Verifikasi Usulan PNS</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Verifikasi Usulan PNS</h4>
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
                            <form action="{{ route('usulan-pns.verify-usulan') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="usulan_pns_id" value="{{ $usulan->id }}">
                                <div class="row mb-5">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="text-uppercase">Data Perorangan Calon Penerima Pensiun (DPCP)</label>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <a href="/uploads/tni/{{ $usulan->dpcp }}" target="blank"><i class="fas fa-file-pdf"></i> {{ $usulan->dpcp }}</a>
                                                <div>
                                                    <span class="btn btn-sm btn-primary terima">Terima</span>
                                                    <span class="btn btn-sm btn-danger tolak">Tolak</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control d-none" placeholder="catatan" name="note_dpcp">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">SK/KEP cpns</label>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <a href="/uploads/tni/{{ $usulan->kep_cpns }}" target="blank"><i class="fas fa-file-pdf"></i> {{ $usulan->kep_cpns }}</a>
                                                <div>
                                                    <span class="btn btn-sm btn-primary terima">Terima</span>
                                                    <span class="btn btn-sm btn-danger tolak">Tolak</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control d-none" placeholder="catatan" name="note_kep_cpns">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">SK/KEP pns</label>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <a href="/uploads/tni/{{ $usulan->kep_pns }}" target="blank"><i class="fas fa-file-pdf"></i> {{ $usulan->kep_pns }}</a>
                                                <div>
                                                    <span class="btn btn-sm btn-primary terima">Terima</span>
                                                    <span class="btn btn-sm btn-danger tolak">Tolak</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control d-none" placeholder="catatan" name="note_kep_pns">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">SK/KEP Kenaikan Pangkat Terakhir</label>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <a href="/uploads/tni/{{ $usulan->kep_pangkat }}" target="blank"><i class="fas fa-file-pdf"></i> {{ $usulan->kep_pangkat }}</a>
                                                <div>
                                                    <span class="btn btn-sm btn-primary terima">Terima</span>
                                                    <span class="btn btn-sm btn-danger tolak">Tolak</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control d-none" placeholder="catatan" name="note_kep_pangkat">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">Akta Nikah/Cerai</label>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <a href="/uploads/tni/{{ $usulan->akte_nikah }}" target="blank"><i class="fas fa-file-pdf"></i> {{ $usulan->akte_nikah }}</a>
                                                <div>
                                                    <span class="btn btn-sm btn-primary terima">Terima</span>
                                                    <span class="btn btn-sm btn-danger tolak">Tolak</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control d-none" placeholder="catatan" name="note_akte_nikah">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">Akta kelahiran Anak</label>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <a href="/uploads/tni/{{ $usulan->akte_anak }}" target="blank"><i class="fas fa-file-pdf"></i> {{ $usulan->akte_anak }}</a>
                                                <div>
                                                    <span class="btn btn-sm btn-primary terima">Terima</span>
                                                    <span class="btn btn-sm btn-danger tolak">Tolak</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control d-none" placeholder="catatan" name="note_akte_anak">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="text-uppercase">SP. HD/SP. PIDANA</label>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <a href="/uploads/tni/{{ $usulan->sp_hd }}" target="blank"><i class="fas fa-file-pdf"></i> {{ $usulan->sp_hd }}</a>
                                                <div>
                                                    <span class="btn btn-sm btn-primary terima">Terima</span>
                                                    <span class="btn btn-sm btn-danger tolak">Tolak</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control d-none" placeholder="catatan" name="note_sp_hd">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">Surat keterangan Kematian</label>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                @if($usulan->sk_kematian != null)
                                                <a href="/uploads/tni/{{ $usulan->sk_kematian }}" target="blank"><i class="fas fa-file-pdf"></i> {{ $usulan->sk_kematian }}</a>
                                                @else
                                                <p class="my-0 text-danger font-italic">tidak ada file yang di upload</p>
                                                @endif
                                                <div>
                                                    <span class="btn btn-sm btn-primary terima">Terima</span>
                                                    <span class="btn btn-sm btn-danger tolak">Tolak</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control d-none" placeholder="catatan" name="note_sk_kematian">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">Kartu Keluarga (KK)</label>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <a href="/uploads/tni/{{ $usulan->kk }}" target="blank"><i class="fas fa-file-pdf"></i> {{ $usulan->kk }}</a>
                                                <div>
                                                    <span class="btn btn-sm btn-primary terima">Terima</span>
                                                    <span class="btn btn-sm btn-danger tolak">Tolak</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control d-none" placeholder="catatan" name="note_kk">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">Kenaikan Gaji Berkala (KGB)</label>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <a href="/uploads/tni/{{ $usulan->kgb }}" target="blank"><i class="fas fa-file-pdf"></i> {{ $usulan->kgb }}</a>
                                                <div>
                                                    <span class="btn btn-sm btn-primary terima">Terima</span>
                                                    <span class="btn btn-sm btn-danger tolak">Tolak</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control d-none" placeholder="catatan" name="note_kgb">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-uppercase">Penilaian Prestasi Kerja 1 Tahun Terakhir (PPK)</label>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <a href="/uploads/tni/{{ $usulan->ppk }}" target="blank"><i class="fas fa-file-pdf"></i> {{ $usulan->ppk }}</a>
                                                <div>
                                                    <span class="btn btn-sm btn-primary terima">Terima</span>
                                                    <span class="btn btn-sm btn-danger tolak">Tolak</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control d-none" placeholder="catatan" name="note_ppk">
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
