<x-app-layout>

    @push('css-library')
    <link rel="stylesheet" href="{{ asset('library/selectric/selectric.css') }}">
    @endpush

    <section class="section">
        <div class="section-header">
            <h1>Jabatan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('jabatan.index') }}">Jabatan</a></div>
                <div class="breadcrumb-item active">Edit Jabatan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Edit Jabatan</h4>
                        </div>
                        
                        <div class="card-body">
                            <form action="{{ route('jabatan.update', $jabatan) }}" method="post" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label>Kode Jabatan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" placeholder="masukan kode Jabatan" value="{{ old('code', $jabatan->code) }}">
                                    @error('code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nama Jabatan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="masukan nama Jabatan" value="{{ old('name', $jabatan->name) }}">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Tipe Jabatan <span class="text-danger">*</span></label>
                                    <select class="form-control selectric" name="type">
                                        <option value="TNI" {{ "TNI" == old('type', $jabatan->type) ? 'selected' : '' }}>Jabatan TNI</option>
                                        <option value="PNS" {{ "PNS" == old('type', $jabatan->type) ? 'selected' : '' }}>Jabatan PNS</option>
                                    </select>
                                </div>
                                <div class="d-flex justify-content-end" style="gap: 5px">
                                    <a href="{{ route('jabatan.index') }}" class="btn btn-secondary">Kembali</a>
                                    <button class="btn btn-primary" type="submit">Edit</button>
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
