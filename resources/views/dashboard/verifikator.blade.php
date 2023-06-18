<div class="col-md-12 col-xl-4">
    <div class="row">
        <div class="col-12">
            <a href="{{ route('usulan-tni.index') }}">
                <div class="card card-statistic-1 mb-1" style="height: 95px">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-tags"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Usulan TNI</h4>
                        </div>
                        <div class="card-body">
                        {{ $usulan_tni }}
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12">
            <a href="{{ route('usulan-pns.index') }}">
                <div class="card card-statistic-1" style="height: 96px">
                    <div class="card-icon bg-success">
                        <i class="fas fa-tags"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Usulan PNS</h4>
                        </div>
                        <div class="card-body">
                        {{ $usulan_pns }}
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="col-md-6 col-xl-4">
    <div class="card card-statistic-2">
        <div class="card-stats">
            <div class="card-stats-title">TNI</div>
            <div class="card-stats-items">
                <div class="card-stats-item">
                <div class="card-stats-item-count">{{ $tni->whereNull('usulan_tni_id')->count() }}</div>
                <div class="card-stats-item-label">Tidak Dalam Pengajuan</div>
                </div>
                <div class="card-stats-item">
                <div class="card-stats-item-count">{{ $tni->whereNotNull('usulan_tni_id')->whereNull('surat_sk_id')->count() }}</div>
                <div class="card-stats-item-label">Dalam Pengajuan</div>
                </div>
                <div class="card-stats-item">
                <div class="card-stats-item-count">{{ $tni->whereNotNull('surat_sk_id')->count() }}</div>
                <div class="card-stats-item-label">Lolos Pengajuan</div>
                </div>
            </div>
            </div>
            <div class="card-icon shadow-danger bg-danger">
                <i class="fas fa-user-circle"></i>
            </div>
            <div class="card-wrap">
            <div class="card-header">
                <h4>Total Personil TNI</h4>
            </div>
            <div class="card-body">
                {{ $tni->count() }}
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 col-xl-4">
    <div class="card card-statistic-2">
        <div class="card-stats">
            <div class="card-stats-title">PNS</div>
            <div class="card-stats-items">
                <div class="card-stats-item">
                <div class="card-stats-item-count">{{ $pns->whereNull('usulan_pns_id')->count() }}</div>
                <div class="card-stats-item-label">Tidak Dalam Pengajuan</div>
                </div>
                <div class="card-stats-item">
                <div class="card-stats-item-count">{{ $pns->whereNotNull('usulan_tni_id')->whereNull('surat_sk_id')->count() }}</div>
                <div class="card-stats-item-label">Dalam Pengajuan</div>
                </div>
                <div class="card-stats-item">
                <div class="card-stats-item-count">{{ $pns->whereNotNull('surat_sk_id')->count() }}</div>
                <div class="card-stats-item-label">Lolos Pengajuan</div>
                </div>
            </div>
            </div>
            <div class="card-icon shadow-warning bg-warning">
                <i class="fas fa-user-tie"></i>
            </div>
            <div class="card-wrap">
            <div class="card-header">
                <h4>Total Anggota PNS</h4>
            </div>
            <div class="card-body">
                {{ $pns->count() }}
            </div>
        </div>
    </div>
</div>

<div class="col-xl-6">
    <div class="card">
        <div class="card-header">
            <h4>Kesatuan</h4>
            <div class="card-header-action">
                <h4 class="text-primary">Total 21</h4>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive table-invoice">
            <table class="table table-striped">
                <tbody><tr>
                    <th>No</th>
                    <th>Kode Kesatuan</th>
                    <th>Nama Kesatuan</th>
                </tr>
                @foreach ($kesatuan as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->code }}</td>
                        <td>{{ $row->name }}</td>
                    </tr>
                @endforeach
            </tbody></table>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3">
    <div class="card card-hero">
        <div class="card-header">
            <div class="card-icon">
            <i class="fas fa-file-pdf"></i>
            </div>
            <h4>{{ $tni->whereNotNull('surat_sk_id')->count() }}</h4>
            <div class="card-description">SK Pensiun TNI Terbit</div>
        </div>
        <div class="card-body p-0">
            <div class="tickets-list">
                @foreach($data_tni->whereNotNull('surat_sk_id') as $row)
                <a href="#" class="ticket-item">
                    <div class="ticket-title">
                    <h4>{{ $row->nama }}</h4>
                    </div>
                    <div class="ticket-info">
                    <div class="text-primary">{{ $row->updated_at->diffForHumans() }}</div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3">
    <div class="card card-hero">
        <div class="card-header">
            <div class="card-icon">
            <i class="fas fa-file-pdf"></i>
            </div>
            <h4>{{ $pns->whereNotNull('surat_sk_id')->count() }}</h4>
            <div class="card-description">SK Pensiun PNS Terbit</div>
        </div>
        <div class="card-body p-0">
            <div class="tickets-list">
                @foreach($data_pns->whereNotNull('surat_sk_id') as $row)
                <a href="#" class="ticket-item">
                    <div class="ticket-title">
                    <h4>{{ $row->nama }}</h4>
                    </div>
                    <div class="ticket-info">
                    <div class="text-primary">{{ $row->updated_at->diffForHumans() }}</div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>