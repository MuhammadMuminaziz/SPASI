<x-app-layout>

    <section class="section">
        <div class="section-header">
            <h1>Data TNI</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('tni.index') }}">Data TNI</a></div>
                <div class="breadcrumb-item active">{{ $tni->slug }}</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>{{ $tni->nama }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="w-100">
                                        <tr>
                                            <td width="60%">Kesatuan</td>
                                            <td class="text-primary">{{ $tni->kesatuan->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jabatan</td>
                                            <td class="text-primary">{{ $tni->jabatan->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Gol Jabatan</td>
                                            <td class="text-primary">{{ $tni->gol_jab }}</td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td class="text-primary">{{ $tni->status }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td class="text-primary">{{ $tni->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td>Pangkat</td>
                                            <td class="text-primary">{{ $tni->pangkat }}</td>
                                        </tr>
                                        <tr>
                                            <td>KORPS</td>
                                            <td class="text-primary">{{ $tni->korps }}</td>
                                        </tr>
                                        <tr>
                                            <td>NRP</td>
                                            <td class="text-primary">{{ $tni->nrp }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Lahir</td>
                                            <td class="text-primary">{{ date('d F Y', strtotime($tni->tgl_lahir)) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Sumber</td>
                                            <td class="text-primary">{{ $tni->sumber }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal TMT TNI</td>
                                            <td class="text-primary">{{ date('d F Y', strtotime($tni->tmt_tni)) }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="w-100">
                                        <tr>
                                            <td width="60%">Tanggal TMT Pangkat</td>
                                            <td class="text-primary">{{ date('d F Y', strtotime($tni->tmt_pangkat)) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal TMT Jabatan</td>
                                            <td class="text-primary">{{ date('d F Y', strtotime($tni->tmt_jabatan)) }}</td>
                                        </tr>
                                        <tr>
                                            <td>TMT Lama</td>
                                            <td class="text-primary">{{ $tni->tmt_lama }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal TMT di Kodam XVI/PTM</td>
                                            <td class="text-primary">{{ date('d F Y', strtotime($tni->tmt_kodam)) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kep KASAD</td>
                                            <td class="text-primary">{{ $tni->kep_kasad }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kep KASAD/SP Pangam</td>
                                            <td class="text-primary">{{ $tni->kep_pangam }}</td>
                                        </tr>
                                        <tr>
                                            <td>DIKUM</td>
                                            <td class="text-primary">{{ $tni->dikum }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tahun Lulus DIKUM</td>
                                            <td class="text-primary">{{ $tni->lulus_dikum }}</td>
                                        </tr>
                                        <tr>
                                            <td>DIKBANGUM</td>
                                            <td class="text-primary">{{ $tni->dikbangum }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tahun Lulus DIKBANGUM</td>
                                            <td class="text-primary">{{ $tni->lulus_dikbangum }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-5">
                                <a href="{{ route('tni.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
