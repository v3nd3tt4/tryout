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
                            <li class="breadcrumb-item"> <a href="{{url('soal')}}">  Soal </a></li>
                            <li class="breadcrumb-item active">{{$kategori->kategori_soal}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="page-content-wrapper">
            <div class="container-fluid">
                @csrf
                <input type="hidden" name="kategori_soal" value="{{$kategori_soal}}">
                
                @php 
                $hitung = $soal->count();
                $no = 1;
                @endphp

                @if($hitung != 0)
                @foreach($soal as $is)
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group mb-4">
                                    <label for=""> <b> Soal Ke-{{$no++}}:</b></label>
                                    <input type="hidden" name="id[{{$is->id}}]" value="{{$is->id}}">
                                    <textarea name="isi_soal[{{$is->id}}]" id="" class="form-control" style="min-height: 200px;" required disabled>{{$is->isi_soal}}</textarea>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="">Pilihan Jawaban A</label>
                                    <textarea name="pilihan_jawaban_a[{{$is->id}}]" id="" class="form-control" required disabled>{{$is->pilihan_jawaban_a}}</textarea>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="">Pilihan Jawaban B</label>
                                    <textarea name="pilihan_jawaban_b[{{$is->id}}]" id="" class="form-control" required disabled>{{$is->pilihan_jawaban_b}}</textarea>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="">Pilihan Jawaban C</label>
                                    <textarea name="pilihan_jawaban_c[{{$is->id}}]" id="" class="form-control" required disabled>{{$is->pilihan_jawaban_c}}</textarea>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="">Pilihan Jawaban D</label>
                                    <textarea name="pilihan_jawaban_d[{{$is->id}}]" id="" class="form-control" required disabled>{{$is->pilihan_jawaban_d}}</textarea>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="">Pilihan Jawaban E</label>
                                    <textarea name="pilihan_jawaban_e[{{$is->id}}]" id="" class="form-control" required disabled>{{$is->pilihan_jawaban_e}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Kunci Jawaban:</label>
                                    <select name="kunci_jawaban[{{$is->id}}]" id="" class="form-control" required disabled>
                                        <option value="">--pilih--</option>
                                        @foreach($kunci_jawaban as $kj)
                                        <option value="{{$kj}}" {{$kj==$is->kunci_jawaban?'selected':''}}>{{$kj}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>        
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        <!-- end page-content-wrapper -->
    </div>
    <!-- End Page-content -->
</div>
@endsection