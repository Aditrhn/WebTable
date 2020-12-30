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
                                <h6 class="h2 text-white d-inline-block mb-0">Add Table</h6>
                                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                        <li class="breadcrumb-item"><a
                                                href="{{ URL::route('home') }}"><i
                                                    class="fas fa-home"></i></a></li>
                                        <li class="breadcrumb-item"><a
                                                href="{{ URL::route('table.add') }}">Add Table</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Select Row & Column</li>
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
                                <h3 class="mb-0">Pilih Baris dan Kolom</h3>
                            </div>
                        </div>
                    </div>
                    <form action="{{ URL::route('select.success') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row" id="pageSelectRow">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Judul Tabel</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="judul">
                                        @forelse($tableName as $tableNames)
                                            <option value="{{ $tableNames->id }}">{{ $tableNames->name }}</option>
                                        @empty
                                            <option value="">Belum Ada Data.</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="pageSelectRow">
                            @for($i = 0; $i < $jmlcol; $i++)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kolom {{ $i+1 }}</label>
                                        <select class="form-control" id="exampleFormControlSelect1"
                                            name="kolom{{ $i+1 }}">
                                            @forelse($col as $cols)
                                                <option value="{{ $cols->id }}">{{ $cols->column_name }}</option>
                                            @empty
                                                <option value="">Belum Ada Data.</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <div class="row" id="pageSelectRow">
                            @for($j = 0; $j < $jmlrow; $j++)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Baris {{ $j+1 }}</label>
                                        <select class="form-control" id="exampleFormControlSelect1"
                                            name="baris{{ $j+1 }}">
                                            @forelse($row as $rows)
                                                <option value="{{ $rows->id }}">{{ $rows->row_name }}</option>
                                            @empty
                                                <option value="">Belum Ada Data.</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <input type="text" value="{{ $i+1 }}" name="jmlcol" hidden>
                        <input type="text" value="{{ $j+1 }}" name="jmlrow" hidden>

                        <div class="card-footer py-4">
                            <nav class="d-flex justify-content-end" aria-label="...">
                                <div class="col-4 text-right">
                                    <a href="{{ URL::route('home') }}"
                                        class="btn btn-md btn-secondary">Cancel</a>
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
