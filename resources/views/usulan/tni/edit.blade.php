<x-app-layout>

    @push('css-library')
    <link rel="stylesheet" href="{{ asset('library/selectric/selectric.css') }}">
    @endpush

    <section class="section">
        <div class="section-header">
            <h1>Usulan TNI</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('usulan-tni.index') }}">Usulan TNI</a></div>
                <div class="breadcrumb-item active">Revisi Usulan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Revisi Usulan TNI</h4>
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
                            <form action="{{ route('usulan-tni.update', $usulan->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="note_tni_id" value="{{ $usulan->noteTni->id }}">
                                <div class="row mb-5">
                                    <div class="col-md-12">
                                        @if($usulan->noteTni->note_skep_pengangkatan != null)
                                        <div class="form-group">
                                            <label class="text-uppercase">FOTOKOPI SKEP Pengangkatan Pertama Dilegalisir Pejabat PERS</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('skep_pengangkatan') is-invalid @enderror" name="skep_pengangkatan" id="skep_pengangkatan">
                                                <label class="custom-file-label overflow-hidden" for="skep_pengangkatan">{{ $usulan->skep_pengangkatan }}</label>
                                                @error('skep_pengangkatan')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <div class="mt-3 border border-1 rounded p-2 border-danger text-danger">{{ $usulan->noteTni->note_skep_pengangkatan }}</div>
                                            </div>
                                        </div>
                                        @endif
                                        @if($usulan->noteTni->note_skep_pangkat != null)
                                        <div class="form-group">
                                            <label class="text-uppercase">FOTOKOPI SKEP pangkat terakhir dilegalisir Pejabat pers</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('skep_pangkat') is-invalid @enderror" name="skep_pangkat" id="skep_pangkat">
                                                <label class="custom-file-label overflow-hidden" for="skep_pangkat">{{ $usulan->skep_pangkat }}</label>
                                                @error('skep_pangkat')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <div class="mt-3 border border-1 rounded p-2 border-danger text-danger">{{ $usulan->noteTni->note_skep_pangkat }}</div>
                                            </div>
                                        </div>
                                        @endif
                                        @if($usulan->noteTni->note_skep_pemberhentian != null)
                                        <div class="form-group">
                                            <label class="text-uppercase">FOTOKOPI SKEP pemberhentian dengan hormat Dilegalisir Pejabat PERS</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('skep_pemberhentian') is-invalid @enderror" name="skep_pemberhentian" id="skep_pemberhentian">
                                                <label class="custom-file-label overflow-hidden" for="skep_pemberhentian">{{ $usulan->skep_pemberhentian }}</label>
                                                @error('skep_pemberhentian')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <div class="mt-3 border border-1 rounded p-2 border-danger text-danger">{{ $usulan->noteTni->note_skep_pemberhentian }}</div>
                                            </div>
                                        </div>
                                        @endif
                                        @if($usulan->noteTni->note_dcpp != null)
                                        <div class="form-group">
                                            <label class="text-uppercase">DCPP</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('dcpp') is-invalid @enderror" name="dcpp" id="dcpp">
                                                <label class="custom-file-label overflow-hidden" for="dcpp">{{ $usulan->dcpp }}</label>
                                                @error('dcpp')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <div class="mt-3 border border-1 rounded p-2 border-danger text-danger">{{ $usulan->noteTni->note_dcpp }}</div>
                                            </div>
                                        </div>
                                        @endif
                                        @if($usulan->noteTni->note_srt_nikah != null)
                                        <div class="form-group">
                                            <label class="text-uppercase">FOTOKOPI Surat nikah Dilegalisir Pejabat PERS</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('srt_nikah') is-invalid @enderror" name="srt_nikah" id="srt_nikah">
                                                <label class="custom-file-label overflow-hidden" for="srt_nikah">{{ $usulan->srt_nikah }}</label>
                                                @error('srt_nikah')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <div class="mt-3 border border-1 rounded p-2 border-danger text-danger">{{ $usulan->noteTni->note_srt_nikah }}</div>
                                            </div>
                                        </div>
                                        @endif
                                        @if($usulan->noteTni->note_skep_milsuk != null)
                                        <div class="form-group">
                                            <label class="text-uppercase">FOTOKOPI SKEP Milsuk yang berasal dari milwa Dilegalisir Pejabat PERS</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('skep_milsuk') is-invalid @enderror" name="skep_milsuk" id="skep_milsuk">
                                                <label class="custom-file-label overflow-hidden" for="skep_milsuk">{{ $usulan->skep_milsuk }}</label>
                                                @error('skep_milsuk')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <div class="mt-3 border border-1 rounded p-2 border-danger text-danger">{{ $usulan->noteTni->note_skep_milsuk }}</div>
                                            </div>
                                        </div>
                                        @endif
                                        @if($usulan->noteTni->note_kpi != null)
                                        <div class="form-group">
                                            <label class="text-uppercase">FOTOKOPI KPI Dilegalisir Pejabat PERS</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('kpi') is-invalid @enderror" name="kpi" id="kpi">
                                                <label class="custom-file-label overflow-hidden" for="kpi">{{ $usulan->kpi }}</label>
                                                @error('kpi')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <div class="mt-3 border border-1 rounded p-2 border-danger text-danger">{{ $usulan->noteTni->note_kpi }}</div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="col-md-12">
                                        @if($usulan->noteTni->note_akte != null)
                                        <div class="form-group">
                                            <label class="text-uppercase">FOTOKOPI Akte kelahiran anak yang belum dewasa</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('akte') is-invalid @enderror" name="akte" id="akte">
                                                <label class="custom-file-label overflow-hidden" for="akte">{{ $usulan->akte }}</label>
                                                @error('akte')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <div class="mt-3 border border-1 rounded p-2 border-danger text-danger">{{ $usulan->noteTni->note_akte }}</div>
                                            </div>
                                        </div>
                                        @endif
                                        @if($usulan->noteTni->note_photo != null)
                                        <div class="form-group">
                                            <label class="text-uppercase">Pas foto warna terbaru ukuran 4x6 ybs dan istri latar biru (foto tidak boleh di scan, tidak pake kacamata dan jilbab)</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" name="photo" id="photo">
                                                <label class="custom-file-label overflow-hidden" for="photo">{{ $usulan->photo }}</label>
                                                @error('photo')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <div class="mt-3 border border-1 rounded p-2 border-danger text-danger">{{ $usulan->noteTni->note_photo }}</div>
                                            </div>
                                        </div>
                                        @endif
                                        @if($usulan->noteTni->note_sk_tanggungan_keluarga != null)
                                        <div class="form-group">
                                            <label class="text-uppercase">surat keterangan tanggungan keluarga bentuk ku1</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('sk_tanggungan_keluarga') is-invalid @enderror" name="sk_tanggungan_keluarga" id="sk_tanggungan_keluarga">
                                                <label class="custom-file-label overflow-hidden" for="sk_tanggungan_keluarga">{{ $usulan->sk_tanggungan_keluarga }}</label>
                                                @error('sk_tanggungan_keluarga')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <div class="mt-3 border border-1 rounded p-2 border-danger text-danger">{{ $usulan->noteTni->note_sk_tanggungan_keluarga }}</div>
                                            </div>
                                        </div>
                                        @endif
                                        @if($usulan->noteTni->note_kta_asabri != null)
                                        <div class="form-group">
                                            <label class="text-uppercase">FOTOKOPI kta asabri</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('kta_asabri') is-invalid @enderror" name="kta_asabri" id="kta_asabri">
                                                <label class="custom-file-label overflow-hidden" for="kta_asabri">{{ $usulan->kta_asabri }}</label>
                                                @error('kta_asabri')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <div class="mt-3 border border-1 rounded p-2 border-danger text-danger">{{ $usulan->noteTni->note_kta_asabri }}</div>
                                            </div>
                                        </div>
                                        @endif
                                        @if($usulan->noteTni->note_npwp != null)
                                        <div class="form-group">
                                            <label class="text-uppercase">FOTOKOPI npwp</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('npwp') is-invalid @enderror" name="npwp" id="npwp">
                                                <label class="custom-file-label overflow-hidden" for="npwp">{{ $usulan->npwp }}</label>
                                                @error('npwp')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <div class="mt-3 border border-1 rounded p-2 border-danger text-danger">{{ $usulan->noteTni->note_npwp }}</div>
                                            </div>
                                        </div>
                                        @endif
                                        @if($usulan->noteTni->note_tanda_jasa != null)
                                        <div class="form-group">
                                            <label class="text-uppercase">FOTOKOPI Tanda jasa berupa bintang yang dimiliki</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('tanda_jasa') is-invalid @enderror" name="tanda_jasa" id="tanda_jasa">
                                                <label class="custom-file-label overflow-hidden" for="tanda_jasa">{{ $usulan->tanda_jasa }}</label>
                                                @error('tanda_jasa')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <div class="mt-3 border border-1 rounded p-2 border-danger text-danger">{{ $usulan->noteTni->note_tanda_jasa }}</div>
                                            </div>
                                        </div>
                                        @endif
                                        @if($usulan->noteTni->note_sk_kuliah != null)
                                        <div class="form-group">
                                            <label class="text-uppercase">Surat keterangan kuliah bagi anak yang berumur < 22 tahun</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('sk_kuliah') is-invalid @enderror" name="sk_kuliah" id="sk_kuliah">
                                                <label class="custom-file-label overflow-hidden" for="sk_kuliah">{{ $usulan->sk_kuliah }}</label>
                                                @error('sk_kuliah')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <div class="mt-3 border border-1 rounded p-2 border-danger text-danger">{{ $usulan->noteTni->note_sk_kuliah }}</div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end" style="gap: 5px">
                                    <a href="{{ route('usulan-tni.index') }}" class="btn btn-secondary">Kembali</a>
                                    <button class="btn btn-primary" type="submit">Usulkan Ulang</button>
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
