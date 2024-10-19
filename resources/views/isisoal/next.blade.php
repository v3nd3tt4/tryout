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
                            <li class="breadcrumb-item"> <a href="{{url('isisoal')}}">  Isi Soal </a></li>
                            <li class="breadcrumb-item active">Next</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="page-content-wrapper">
            <div class="container-fluid">
                <form action="{{route('isisoal.store')}}" method="POST">
                @csrf
                <input type="hidden" name="kategori_soal" value="{{$kategori_soal}}">
                
                @php 
                $hitung = $isi_soal->count();
                $no = 1;
                @endphp

                @if($hitung != 0)
                @foreach($isi_soal as $is)
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group mb-4">
                                    <label for=""> <b> Soal Ke-{{$no++}}:</b></label>
                                    <input type="hidden" name="id[{{$is->id}}]" value="{{$is->id}}">
                                    <textarea name="isi_soal[{{$is->id}}]" id="" class="form-control" style="min-height: 200px;" required>{{$is->isi_soal}}</textarea>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="">Pilihan Jawaban A</label>
                                    <textarea name="pilihan_jawaban_a[{{$is->id}}]" id="" class="form-control" required>{{$is->pilihan_jawaban_a}}</textarea>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="">Pilihan Jawaban B</label>
                                    <textarea name="pilihan_jawaban_b[{{$is->id}}]" id="" class="form-control" required>{{$is->pilihan_jawaban_b}}</textarea>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="">Pilihan Jawaban C</label>
                                    <textarea name="pilihan_jawaban_c[{{$is->id}}]" id="" class="form-control" required>{{$is->pilihan_jawaban_c}}</textarea>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="">Pilihan Jawaban D</label>
                                    <textarea name="pilihan_jawaban_d[{{$is->id}}]" id="" class="form-control" required>{{$is->pilihan_jawaban_d}}</textarea>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="">Pilihan Jawaban E</label>
                                    <textarea name="pilihan_jawaban_e[{{$is->id}}]" id="" class="form-control" required>{{$is->pilihan_jawaban_e}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Kunci Jawaban:</label>
                                    <select name="kunci_jawaban[{{$is->id}}]" id="" class="form-control" required>
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
                @else
                @foreach (range(1, $jumlah_soal) as $nomor)
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group mb-4">
                                    <label for=""> <b> Soal Ke-{{$nomor}}:</b></label>
                                    <textarea name="isi_soal[]" id="" class="form-control" style="min-height: 200px;" required></textarea>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="">Pilihan Jawaban A</label>
                                    <textarea name="pilihan_jawaban_a[]" id="" class="form-control" required></textarea>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="">Pilihan Jawaban B</label>
                                    <textarea name="pilihan_jawaban_b[]" id="" class="form-control" required></textarea>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="">Pilihan Jawaban C</label>
                                    <textarea name="pilihan_jawaban_c[]" id="" class="form-control" required></textarea>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="">Pilihan Jawaban D</label>
                                    <textarea name="pilihan_jawaban_d[]" id="" class="form-control" required></textarea>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="">Pilihan Jawaban E</label>
                                    <textarea name="pilihan_jawaban_e[]" id="" class="form-control" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Kunci Jawaban:</label>
                                    <select name="kunci_jawaban[]" id="" class="form-control" required>
                                        <option value="">--pilih--</option>
                                        @foreach($kunci_jawaban as $kj)
                                        <option value="{{$kj}}">{{$kj}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>        
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">                            
                            <div class="card-body">
                                <button type="submit" class="btn btn-info"> <i class="mdi mdi-file-document-box-plus-outline me-1"></i>  Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- end page-content-wrapper -->
    </div>
    <!-- End Page-content -->
</div>
@endsection