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
                        <h4 class="page-title mb-1">Kategori Soal</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Menampilkan Kategori Soal</li>
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
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="dt table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kategori Soal</th>
                                            <th>Keterangan Soal</th>
                                            <th>Total Soal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($no=1)
                                        @foreach ($row as $r)
                                        <tr>
                                            <td>{{$no++}}.</td>
                                            <td>{{$r->kategori_soal}}</td>
                                            <td>{{$r->keterangan_soal}}</td>
                                            <td>{{$r->totalsoal}}</td>
                                            <td>
                                                <button class="btn btn-info btn-sm btn-edit" data-id="{{$r->id}}"> <i class="mdi mdi-pencil me-1"></i> Edit</button>
                                                <button class="btn btn-danger btn-sm btn-hapus" data-id="{{$r->id}}"><i class="mdi mdi-trash-can me-1"></i> Hapus</button>
                                                <a href="{{url('soal/lihat_soal/'.$r->id)}}" class="btn btn-warning btn-sm"> <i class="mdi mdi-eye-outline me-1"></i>Lihat Soal</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->



            </div> <!-- container-fluid -->
        </div>
        <!-- end page-content-wrapper -->
    </div>
    <!-- End Page-content -->
    <!--  Modal content for the above example -->
    <div class="modal fade bs-example-modal-lg" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Tambah Kategori Soal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span class="mdi mdi-close"></span>
                    </button>
                </div>
                <form id="form-tambah">
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="">Kategori Soal</label>
                        <input type="text" class="form-control" name="kategori_soal" required>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan Soal</label>
                        <textarea name="keterangan_soal" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info">Simpan</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!--  Modal content for the above example -->
    <div class="modal fade bs-example-modal-lg" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Edit Kategori Soal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span class="mdi mdi-close"></span>
                    </button>
                </div>
                <form id="form-edit">
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="">Kategori Soal</label>
                        <input type="hidden" name="id" id="id" required>
                        <input type="text" class="form-control" name="kategori_soal" id="kategori_soal" required>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan Soal</label>
                        <textarea name="keterangan_soal" id="keterangan_soal" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info">Simpan</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!--  Modal content for the above example -->
    <div class="modal fade bs-example-modal-lg" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Hapus Kategori Soal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span class="mdi mdi-close"></span>
                    </button>
                </div>
                <form id="form-hapus">
                <div class="modal-body">
                    <p>Apakah anda yakin akan menghapus data ini?</p>
                    <div class="form-group mb-4">
                        <input type="hidden" class="form-control" name="id" id="id_hapus" required>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger">Ya, Hapus</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    @endsection