<x-app-layout>
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">

                @if($user->role->name === 'Super Admin')
                @include('dashboard.admin')
                @endif

                @if($user->role->name === 'Verifikator')
                @include('dashboard.verifikator')
                @endif

                @if($user->role->name === 'Operator')
                @include('dashboard.operator')
                @endif
                
            </div>
        </div>
    </section>
</x-app-layout>
