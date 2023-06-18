<x-app-layout>

    @push('css-library')
    <link rel="stylesheet" href="{{ asset('library/selectric/selectric.css') }}">
    @endpush

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
                        </div>
                        
                        <div class="card-body">

                            @if(auth()->user()->role->name === 'Verifikator')
                            <div class="row">
                                <div class="col-md-7 d-flex">
                                    <div class="form-group w-100">
                                        <select class="form-control selectric" id="form-kesatuan" name="kesatuan" {{ $kesatuan->count() < 1 ? 'disabled' : '' }}>
                                            @if($kesatuan->count() > 0)
                                                <option value="">Filter by kesatuan</option>
                                                @foreach($kesatuan as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach
                                            @else
                                            <option value="">Kesatuan belum tersedia</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="ml-3 pt-1">
                                        <a href="{{ route('usulan-tni.index') }}" class="btn btn-danger rounded-pill"><i class="fas fa-sync-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endif

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
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="page-usulan">
                                    @foreach ($tni as $row)
                                        <tr>
                                            <td class="align-middle">{{ $loop->iteration }}</td>
                                            <td class="align-middle">{{ $row['kesatuan'] }}</td>
                                            <td class="align-middle">{{ $row['jabatan'] }}</td>
                                            <td class="align-middle">{{ $row['gol_jab'] }}</td>
                                            <td class="align-middle">{{ $row['nama'] }}</td>
                                            <td class="align-middle">{{ $row['pangkat'] }}</td>
                                            <td class="align-middle">{{ $row['korps'] }}</td>
                                            <td class="align-middle">{{ $row['nrp'] }}</td>
                                            <td class="align-middle">
                                                @if($row['status_usulan'] == null)
                                                <span class="text-secondary">Belum Usulan</span>
                                                @endif
                                                @if($row['status_usulan'] == 'VERIFIKASI')
                                                <span class="text-warning">Verifikasi</span>
                                                @endif
                                                @if($row['status_usulan'] == 'GAGAL_VERIFIKASI')
                                                <span class="text-danger">Di Tolak</span>
                                                @endif
                                                @if($row['status_usulan'] == 'MENUNGGU_SK')
                                                <span class="text-success">Lolos Verifikasi</span>
                                                @endif
                                                @if($row['status_usulan'] == 'SELESAI')
                                                <span class="text-success">Terbit</span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                @if(auth()->user()->role->name != 'Verifikator')
                                                    @if($row['status_usulan'] == null)
                                                    <a href="{{ route('usulan-tni.create', $row['slug']) }}" class="btn btn-success m-0 btn-sm mb-1"><i class="fas fa-plus"></i> Buat Usulan</a>
                                                    @endif
                                                    @if($row['status_usulan'] == 'GAGAL_VERIFIKASI')
                                                    <a href="{{ route('usulan-tni.revisi', $row['slug']) }}" class="btn btn-danger m-0 btn-sm mb-1"><i class="fas fa-sync-alt"></i> Revisi</a>
                                                    @endif
                                                    @if($row['status_usulan'] == 'SELESAI')
                                                    <a href="{{ asset('uploads/sk/' . $row['surat_sk']) }}" download="" class="btn btn-sm btn-success"><i class="fas fa-download"></i> Download SK</a>
                                                    @endif
                                                @else
                                                    @if($row['status_usulan'] == 'VERIFIKASI')
                                                    <a href="{{ route('usulan-tni.verify', $row['slug']) }}" class="btn btn-sm btn-warning">Verifikasi</a>
                                                    @endif
                                                    @if($row['status_usulan'] == 'MENUNGGU_SK')
                                                    <button data-slug="{{ $row['slug'] }}" class="btn btn-sm btn-primary upload-sk"><i class="fas fa-upload"></i> Upload SK</button>
                                                    @endif
                                                    @if($row['status_usulan'] == 'SELESAI')
                                                    <a href="{{ asset('uploads/sk/' . $row['surat_sk']) }}" download="" class="btn btn-sm btn-success"><i class="fas fa-download"></i> Download SK</a>
                                                    @endif
                                                @endif
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
        <div class="upload-sk d-none"></div>
    </section>

    <form action="{{ route('usulan-tni.upload') }}" method="post" id="form-upload" enctype="multipart/form-data">
        @csrf
        <p>Surat Keterangan pensiun yang di upload merupakan surat yang masih berbentuk draff.</p>
        <input type="hidden" name="slug" id="slug">
        <div class="form-group">
            <label class="text-uppercase">Surat SK</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="srt_sk" id="srt_sk">
                <label class="custom-file-label overflow-hidden" for="srt_sk">Choose file</label>
            </div>
            <small class="form-text text-muted">
                Pastikan file berbentuk pdf dan tidak lebih dari 3 Mb
            </small>
        </div>
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary">Upload</button>
        </div>
    </form>

    @push('js-library')
    <script src="{{ asset('library/selectric/jquery.selectric.min.js') }}"></script>
    @endpush

    @push('js')
        <script>
            $(".upload-sk").click(function(){
                let slug = $(this).data('slug');
                $('#slug').val(slug);
            })
            $(".upload-sk").fireModal({title: "Upload SK", body: $('#form-upload')});

            $('#srt_sk').on('change', function(){
                var file = $('#srt_sk')[0].files;
                var fileName = "";
                for(let i = 0; i < file.length; i++){
                    fileName += file[i].name + ", ";
                }
                $(this).next().text(fileName);
            })

            $('#form-kesatuan').on('change', function(){
                let val = $(this).val();
                $.ajax({
                    url: "{{ route('filter') }}",
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {val: val},
                    success: function(res){
                        $('#page-usulan').html(res);
                    },
                    errors: function(er){
                        console.log(er);
                    }
                })
            })
        </script>
    @endpush
</x-app-layout>
