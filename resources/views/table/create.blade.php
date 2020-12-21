@extends('layouts.app')

@section('content')

<div class="main-content">
    <!-- Top navbar -->
    <div class="header bg-gradient-primary pb-6 pt-5 pt-md-6">
        <div class="container-fluid">
            <div class="header">
                <div class="container-fluid">
                    <div class="header-body">
                        <div class="row align-items-center py-4">
                            <div class="col-lg-6 col-7">
                                <h6 class="h2 text-white d-inline-block mb-0">Create Table</h6>
                                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                        <li class="breadcrumb-item"><a
                                                href="{{ URL::route('home') }}"><i
                                                    class="fas fa-home"></i></a></li>
                                        <li class="breadcrumb-item"><a
                                                href="{{ URL::route('user.index') }}">Create Table</a></li>
                                        {{-- <li class="breadcrumb-item active" aria-current="page">Edit User</li> --}}
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Input Judul Table</h3>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Creation Date</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Admin Admin</td>
                                    <td>
                                        <a href="mailto:admin@argon.com">admin@argon.com</a>
                                    </td>
                                    <td>12/02/2020 11:00</td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> --}}
                    <form action="{{ URL::route('table.success') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Judul Tabel</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control form-control-alternative"
                                        id="exampleFormControlInput1" placeholder="judul tabel" name="judul">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-goup">
                                    <div class="col-md-12">
                                        <label>Nama Dinas</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control form-control-alternative"
                                        id="exampleFormControlInput1" placeholder="name example" name="name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Password</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control form-control-alternative"
                                        id="exampleFormControlInput1" placeholder="password" name="password">
                                        <p style="font-size: 10px; font-weight: bold">* Leave empty if not changed</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="card-footer py-4">
                            <nav class="d-flex justify-content-end" aria-label="...">
                                <div class="col-4 text-right">
                                    <a href="{{ URL::route('home') }}" class="btn btn-md btn-secondary">Cancel</a>
                                    <button class="btn btn-md btn-primary" type="submit">Submit</button>
                                </div>
                            </nav>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
</div>

@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Argon JS -->
    <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
@endpush
