<x-app-layout>
    <section class="section">
        <div class="section-header">
            <h1>Kesatuan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('kesatuan.index') }}">Kesatuan</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>Daftar Kesatuan</h4>
                            <a href="{{ route('kesatuan.create') }}" class="btn btn-primary">Tambah Kesatuan</a>
                        </div>
                        
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped nowrap table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Kode Kesatuan</th>
                                    <th>Nama Kesatuan</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kesatuan as $row)
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">{{ $row->code }}</td>
                                        <td class="align-middle">{{ $row->name }}</td>
                                        <td class="align-middle text-center">
                                            <a href="{{ route('kesatuan.edit', $row) }}" class="btn btn-success m-0 btn-sm mb-1"><i class="far fa-edit"></i> Edit</a>
                                            <form action="{{ route('kesatuan.destroy', $row) }}" method="post" class="d-inline">
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
