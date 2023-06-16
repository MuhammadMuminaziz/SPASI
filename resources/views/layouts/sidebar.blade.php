<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}">SPASI</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ route('dashboard') }}">SPASI</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
        
        @if (auth()->user()->role->name === 'Super Admin')
            <li class="menu-header">Managemen</li>
            <li class="{{ request()->is('kesatuan*') ? 'active' : '' }}"><a href="{{ route('kesatuan.index') }}" class="nav-link"><i class="fas fa-code-branch"></i></i><span>Kesatuan</span></a></li>
            <li class="{{ request()->is('jabatan*') ? 'active' : '' }}"><a href="{{ route('jabatan.index') }}" class="nav-link"><i class="fas fa-star"></i></i><span>Nama Jabatan</span></a></li>
            <li class="{{ request()->is('users*') ? 'active' : '' }}"><a href="{{ route('users.index') }}" class="nav-link"><i class="fas fa-users-cog"></i><span>User Kesatuan</span></a></li>
        @endif
        
        @if (auth()->user()->role->name === 'Verifikator' || auth()->user()->role->name === 'Operator')
            @if(auth()->user()->role->name === 'Operator')
                <li class="menu-header">Manage Data</li>
                <li class="{{ request()->is('tni*') ? 'active' : '' }}"><a href="{{ route('tni.index') }}" class="nav-link"><i class="fas fa-user-circle"></i><span>Personil TNI</span></a></li>
                <li class="{{ request()->is('pns*') ? 'active' : '' }}"><a href="{{ route('pns.index') }}" class="nav-link"><i class="fas fa-user-tie"></i><span>PNS</span></a></li>
            @endif

            <li class="menu-header">Manage Usulan</li>
            <li class="{{ request()->is('usulan-tni*') ? 'active' : '' }}"><a href="{{ route('usulan-tni.index') }}" class="nav-link"><i class="fas fa-tags"></i><span>Usulan TNI</span></a></li>
            <li class="{{ request()->is('usulan-pns*') ? 'active' : '' }}"><a href="{{ route('usulan-pns.index') }}" class="nav-link"><i class="fas fa-tags"></i><span>Usulan PNS</span></a></li>
        @endif

    </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger btn-block btn-icon-split logout"><i class="fas fa-sign-out-alt"></i> Logout</button>
            </form>
        </div>
    </aside>
</div>