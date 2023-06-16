<x-guest-layout>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#6777ef" fill-opacity="1" d="M0,224L34.3,213.3C68.6,203,137,181,206,181.3C274.3,181,343,203,411,197.3C480,192,549,160,617,138.7C685.7,117,754,107,823,106.7C891.4,107,960,117,1029,101.3C1097.1,85,1166,43,1234,21.3C1302.9,0,1371,0,1406,0L1440,0L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"></path></svg>
    <div class="container-fluid login-container px-md-5">
        <div class="row pb-5">
            <div class="col-lg-6 d-flex mb-3 justify-content-center align-items-center">
                <div class="w-75">
                    @include('auth.svg')
                </div>
            </div>
            <div class="col-lg-6 d-flex justify-content-center align-items-center">
                <div class="col-lg-7 mb-3">
                    <h2 class="text-uppercase text-center mb-0">Spasi</h2>
                    <p class="text-uppercase text-center h5 lh-1 mb-3">(Sistem Informasi Pengusulan Administrasi Pensiun)</p>
                    <div class="card card-primary mb-3">
                        <div class="card-header">
                            <h4>Login</h4>
                        </div>
                        <div class="card-body">
                            @error('error')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="masukan username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-5">
                                    <div class="form-group m-0">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="remember" name="remember" value="remember">
                                            <label class="form-check-label" for="remember">Remember me</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
