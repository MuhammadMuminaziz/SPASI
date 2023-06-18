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