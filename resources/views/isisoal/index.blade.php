@extends('templates.wrapper')
@section('content')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">

        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title mb-1">Isi Soal</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Menampilkan Isi Soal</li>
                        </ol>
                    </div>
                    <div class="col-md-4">
                        <div class="float-end d-none d-md-block">
                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn btn-light rounded-pill user text-start d-flex align-items-center btn-tambah">
                                    <i class="mdi mdi-file-document-box-plus-outline me-1"></i> Tambah Kategori Soal
                                </button>
                                <!-- <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <form action="{{ url('isisoal/next') }}" method="POST">
                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if (session('failed'))
                                    <div class="alert alert-danger">
                                        {{ session('failed') }}
                                    </div>
                                @endif
                                <div class="form-group mb-4">
                                    <label for="">Kategori Soal:</label>
                                    @csrf
                                    <select name="kategori_soal"  class="form-control ">
                                        <option value="">--Pilih--</option>
                                        @foreach ($row as $r)
                                        <option value="{{$r->id}}">{{$r->kategori_soal}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Jumlah Soal:</label>
                                    <input type="number" name="jumlah_soal" class="form-control">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-info">Selanjutnya</button>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- end row -->



            </div> <!-- container-fluid -->
        </div>
        <!-- end page-content-wrapper -->
    </div>
    <!-- End Page-content -->
    @endsection