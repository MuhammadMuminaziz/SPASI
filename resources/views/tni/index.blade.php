<x-app-layout>
    <section class="section">
        <div class="section-header">
            <h1>Data TNI</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('tni.index') }}">Data TNI</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>Daftar Data TNI</h4>
                            <a href="{{ route('tni.create') }}" class="btn btn-primary">Tambah Data TNI</a>
                        </div>
                        
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped nowrap table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Kesatuan</th>
                                    <th>Jabatan</th>
                                    <th>Gol Jabatan</th>
                                    <th>Nama</th>
                                    <th>Pangkat</th>
                                    <th>KORPS</th>
                                    <th>NRP</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tni as $row)
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">{{ $row->kesatuan->name }}</td>
                                        <td class="align-middle">{{ $row->jabatan->name }}</td>
                                        <td class="align-middle">{{ $row->gol_jab }}</td>
                                        <td class="align-middle">{{ $row->nama }}</td>
                                        <td class="align-middle">{{ $row->pangkat }}</td>
                                        <td class="align-middle">{{ $row->korps }}</td>
                                        <td class="align-middle">{{ $row->nrp }}</td>
                                        <td class="align-middle text-center">
                                            <a href="{{ route('tni.show', $row) }}" class="btn btn-primary m-0 btn-sm mb-1"><i class="far fa-eye"></i> Lihat</a>
                                            <a href="{{ route('tni.edit', $row) }}" class="btn btn-success m-0 btn-sm mb-1"><i class="far fa-edit"></i> Edit</a>
                                            <form action="{{ route('tni.destroy', $row) }}" method="post" class="d-inline">
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
