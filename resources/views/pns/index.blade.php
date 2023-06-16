<x-app-layout>
    <section class="section">
        <div class="section-header">
            <h1>Data PNS</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('pns.index') }}">Data PNS</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>Daftar Data PNS</h4>
                            <a href="{{ route('pns.create') }}" class="btn btn-primary">Tambah Data PNS</a>
                        </div>
                        
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped nowrap table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Jabatan</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Pangkat</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pns as $row)
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">{{ $row->jabatan->name ?? '-' }}</td>
                                        <td class="align-middle">{{ $row->nip }}</td>
                                        <td class="align-middle">{{ $row->nama }}</td>
                                        <td class="align-middle">{{ $row->tgl_lahir }}</td>
                                        <td class="align-middle">{{ $row->pangkat }}</td>
                                        <td class="align-middle text-center">
                                            <a href="{{ route('pns.show', $row) }}" class="btn btn-primary m-0 btn-sm mb-1"><i class="far fa-eye"></i> Lihat</a>
                                            <a href="{{ route('pns.edit', $row) }}" class="btn btn-success m-0 btn-sm mb-1"><i class="far fa-edit"></i> Edit</a>
                                            <form action="{{ route('pns.destroy', $row) }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="d-none"></button>
                                                    <a href="" class="btn btn-sm btn-danger not-link confirm-delete mb-1"><i class="fas fa-trash"></i> Hapus</a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
