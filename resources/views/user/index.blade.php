<x-app-layout>
    <section class="section">
        <div class="section-header">
            <h1>User Managemen</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('users.index') }}">User Managemen</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-10">
                    <div class="card card-primary">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>Daftar User</h4>
                            <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah User</a>
                        </div>
                        
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped nowrap table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Nama User</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Kesatuan</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">{{ $user->name }}</td>
                                        <td class="align-middle">{{ $user->username }}</td>
                                        <td class="align-middle">{{ $user->role->name }}</td>
                                        <td class="align-middle">{{ $user->kesatuan->name ?? '-' }}</td>
                                        <td class="align-middle">
                                            @if($user->is_active)
                                            <span class="text-success">Aktif</span>
                                            @else
                                            <span class="text-danger">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="{{ route('users.edit', $user) }}" class="btn btn-success m-0 btn-sm mb-1"><i class="far fa-edit"></i> Edit</a>
                                            <form action="{{ route('users.destroy', $user) }}" method="post" class="d-inline">
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
