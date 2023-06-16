<x-app-layout>

    <section class="section">
        <div class="section-header">
            <h1>Data PNS</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('pns.index') }}">Data PNS</a></div>
                <div class="breadcrumb-item active">{{ $pns->slug }}</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>{{ $pns->nama }}</h4>
                        </div>
                        <div class="card-body">
                            <table class="w-100">
                                <tr>
                                    <td>Jabatan</td>
                                    <td class="text-primary">{{ $pns->jabatan->name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>NIP</td>
                                    <td class="text-primary">{{ $pns->nip }}</td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td class="text-primary">{{ $pns->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Pangkat/Golongan</td>
                                    <td class="text-primary">{{ $pns->pangkat }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td class="text-primary">{{ date('d F Y', strtotime($pns->tgl_lahir)) }}</td>
                                </tr>
                                <tr>
                                    <td>DIKUM</td>
                                    <td class="text-primary">{{ $pns->dikum }}</td>
                                </tr>
                                <tr>
                                    <td>Tahun Lulus DIKUM</td>
                                    <td class="text-primary">{{ $pns->lulus_dikum }}</td>
                                </tr>
                                <tr>
                                    <td>DIKJANG/DIKSUS</td>
                                    <td class="text-primary">{{ $pns->dikjang }}</td>
                                </tr>
                                <tr>
                                    <td>Tahun Lulus DIKJANG/DIKSUS</td>
                                    <td class="text-primary">{{ $pns->lulus_dikjang }}</td>
                                </tr>
                                <tr>
                                    <td>No Kep/Sprint Jab TMT</td>
                                    <td class="text-primary">{{ $pns->kep_jab }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal No Kep/Sprint Jab TMT</td>
                                    <td class="text-primary">{{ date('d F Y', strtotime($pns->tgl_kep_jab)) }}</td>
                                </tr>
                            </table>
                            <div class="d-flex justify-content-end mt-5">
                                <a href="{{ route('pns.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
