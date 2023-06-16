<x-app-layout>
    <section class="section">
        <div class="section-header">
            <h1>Jabatan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('jabatan.index') }}">Jabatan</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>Daftar Jabatan</h4>
                            <a href="{{ route('jabatan.create') }}" class="btn btn-primary">Tambah Jabatan</a>
                        </div>

                        <div class="card-body">
                            <ul class="nav nav-pills" id="myTab3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Jabatan TNI</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Jabatan PNS</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                                    <div class="table-responsive">
                                        <table class="table table-striped nowrap table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>Kode Jabatan</th>
                                                <th>Nama Jabatan</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jabatan->where('type', 'TNI') as $row)
                                                <tr>
                                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                                    <td class="align-middle">{{ $row->code }}</td>
                                                    <td class="align-middle">{{ $row->name }}</td>
                                                    <td class="align-middle text-center">
                                                        <a href="{{ route('jabatan.edit', $row) }}" class="btn btn-success m-0 btn-sm mb-1"><i class="far fa-edit"></i> Edit</a>
                                                        <form action="{{ route('jabatan.destroy', $row) }}" method="post" class="d-inline">
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
                                <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                                    <div class="table-responsive">
                                        <table class="table table-striped nowrap table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>Kode Jabatan</th>
                                                <th>Nama Jabatan</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jabatan->where('type', 'PNS') as $row)
                                                <tr>
                                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                                    <td class="align-middle">{{ $row->code }}</td>
                                                    <td class="align-middle">{{ $row->name }}</td>
                                                    <td class="align-middle text-center">
                                                        <a href="{{ route('jabatan.edit', $row) }}" class="btn btn-success m-0 btn-sm mb-1"><i class="far fa-edit"></i> Edit</a>
                                                        <form action="{{ route('jabatan.destroy', $row) }}" method="post" class="d-inline">
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
                        
                        {{-- <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped nowrap table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Kode Jabatan</th>
                                        <th>Nama Jabatan</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jabatan as $row)
                                        <tr>
                                            <td class="align-middle">{{ $loop->iteration }}</td>
                                            <td class="align-middle">{{ $row->code }}</td>
                                            <td class="align-middle">{{ $row->name }}</td>
                                            <td class="align-middle text-center">
                                                <a href="{{ route('jabatan.edit', $row) }}" class="btn btn-success m-0 btn-sm mb-1"><i class="far fa-edit"></i> Edit</a>
                                                <form action="{{ route('jabatan.destroy', $row) }}" method="post" class="d-inline">
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
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
