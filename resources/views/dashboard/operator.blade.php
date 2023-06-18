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
    <a href="{{ route('tni.index') }}">
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
    </a>
</div>
<div class="col-md-6 col-xl-4">
    <a href="{{ route('pns.index') }}">
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
    </a>
</div>