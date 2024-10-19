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
                        <h4 class="page-title mb-1">User</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Menampilkan Semua User</li>
                        </ol>
                    </div>
                    <div class="col-md-4">
                        <div class="float-end d-none d-md-block">
                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn btn-light rounded-pill user text-start d-flex align-items-center btn-tambah">
                                    <i class="mdi mdi-file-document-box-plus-outline me-1"></i> Tambah User
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
                            <form action="{{ url('isisoal/next') }}" method="POST">
                                <div class="card-body">
                                    <table class="dt table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama User</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($no=1)
                                            @foreach ($users as $r)
                                            <tr>
                                                <td>{{$no++}}.</td>
                                                <td>{{$r->name}}</td>
                                                <td>{{$r->email}}</td>
                                                <td>
                                                @foreach ($r->roles as $role)
                                                    {{ $role->name }}
                                                @endforeach
                                                </td>
                                                <td>
                                                    <button class="btn btn-info btn-sm btn-edit" data-id="{{$r->id}}"> <i class="mdi mdi-pencil me-1"></i> Edit</button>
                                                    <button class="btn btn-danger btn-sm btn-hapus" data-id="{{$r->id}}"><i class="mdi mdi-trash-can me-1"></i> Hapus</button>                                                    
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

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
     <!--  Modal content for the above example -->
    <div class="modal fade bs-example-modal-lg" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span class="mdi mdi-close"></span>
                    </button>
                </div>
                <form id="form-tambah">
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="">Nama </label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="">Email </label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="">Password </label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="">Role </label>
                        <select name="role" id="" class="form-control">
                            <option value="">--pilih--</option>
                            @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>                            
                            @endforeach
                        </select>
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
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span class="mdi mdi-close"></span>
                    </button>
                </div>
                <form id="form-edit">
                <div class="modal-body">
                    <div class="form-group mb-4">
                            <label for="">Nama </label>
                            <input type="text" name="id" id="id">
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="">Email </label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="">Password (Isi jika hanya ingin mengubah password)</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="form-group mb-4">
                            <label for="">Role </label>
                            <select name="role" id="role" class="form-control">
                                <option value="">--pilih--</option>
                                @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>                            
                                @endforeach
                            </select>
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
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Hapus User</h5>
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