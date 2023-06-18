<div class="col-md-4">
    <a href="{{ route('kesatuan.index') }}">
        <div class="card card-statistic-1 mb-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-code-branch"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Kesatuan</h4>
                </div>
                <div class="card-body">
                    {{ $kesatuan->count() }}
                </div>
            </div>
        </div>
    </a>
</div>
<div class="col-md-4">
    <a href="{{ route('jabatan.index') }}">
        <div class="card card-statistic-1 mb-1">
            <div class="card-icon bg-danger">
                <i class="fas fa-star"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Jabatan</h4>
                </div>
                <div class="card-body">
                    {{ $jabatan }}
                </div>
            </div>
        </div>
    </a>
</div>
<div class="col-md-4">
    <a href="{{ route('users.index') }}">
        <div class="card card-statistic-1 mb-1">
            <div class="card-icon bg-warning">
                <i class="fas fa-users-cog"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Operator</h4>
                </div>
                <div class="card-body">
                    {{ $operator }}
                </div>
            </div>
        </div>
    </a>
</div>