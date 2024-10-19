<?php

namespace App\Http\Controllers;

use App\Models\IsiSoal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Soal;
use Illuminate\Support\Facades\DB;

class IsiSoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $row = Soal::orderBy('id', 'DESC')->get();
        $data = array(
            'link' => 'isi',
            'script' => 'isisoal/script'
        );
		return view('isisoal/index', compact('row'))->with($data);
    }

    public function next(Request $request){
        $request->validate([
            'kategori_soal' => 'required',
            'jumlah_soal' => 'required',
        ]);

        $row = IsiSoal::where('id_kategori_soal', $request->input('kategori_soal'))->get();

        $data = array(
            'link' => 'isi',
            'script' => 'isisoal/script',
            'jumlah_soal' => $request->input('jumlah_soal'),
            'kategori_soal' => $request->input('kategori_soal'),
            'kunci_jawaban' => range('A', 'E'),
            'isi_soal' => $row
        );
		return view('isisoal/next')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'kategori_soal' => 'required|string',
            'isi_soal' => 'required|array',
            'isi_soal.*' => 'required|string',
            'pilihan_jawaban_a' => 'required|array',
            'pilihan_jawaban_a.*' => 'required|string',
            'pilihan_jawaban_b' => 'required|array',
            'pilihan_jawaban_b.*' => 'required|string',
            'pilihan_jawaban_c' => 'required|array',
            'pilihan_jawaban_c.*' => 'required|string',
            'pilihan_jawaban_d' => 'required|array',
            'pilihan_jawaban_d.*' => 'required|string',
            'pilihan_jawaban_e' => 'required|array',
            'pilihan_jawaban_e.*' => 'required|string',
            'kunci_jawaban' => 'required|array',
            'kunci_jawaban.*' => 'required|string',
        ]);

        $row = IsiSoal::where('id_kategori_soal', $request->input('kategori_soal'))->get();
        $hitung = $row->count();

        if($hitung == 0){

            // Inisialisasi array untuk batch insert
            $dataToInsert = [];

            // Lakukan looping untuk setiap soal dan jawabannya
            foreach ($request->isi_soal as $key => $isiSoal) {
                $dataToInsert[] = [
                    'id_kategori_soal' => $request->kategori_soal,
                    'isi_soal' => $isiSoal,
                    'pilihan_jawaban_a' => $request->pilihan_jawaban_a[$key],
                    'pilihan_jawaban_b' => $request->pilihan_jawaban_b[$key],
                    'pilihan_jawaban_c' => $request->pilihan_jawaban_c[$key],
                    'pilihan_jawaban_d' => $request->pilihan_jawaban_d[$key],
                    'pilihan_jawaban_e' => $request->pilihan_jawaban_e[$key],
                    'kunci_jawaban' => $request->kunci_jawaban[$key],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            try{
                // Insert batch ke dalam database
                IsiSoal::insert($dataToInsert);
                return redirect()->route('isisoal.index')->with('success', 'Data soal berhasil disimpan secara batch');
            }catch(\Exception $e){
                return redirect()->route('isisoal.index')->with('failed', 'Data soal gagal disimpan secara batch');
            }
        }else{
            DB::beginTransaction();
            try {
                // Ambil semua ID
                $idArray = $request->input('id'); 
                
                // Update data berdasarkan ID
                foreach($idArray as $key => $id) {
                    IsiSoal::where('id', $id)->update([
                        'isi_soal' => $request->isi_soal[$key],
                        'pilihan_jawaban_a' => $request->pilihan_jawaban_a[$key],
                        'pilihan_jawaban_b' => $request->pilihan_jawaban_b[$key],
                        'pilihan_jawaban_c' => $request->pilihan_jawaban_c[$key],
                        'pilihan_jawaban_d' => $request->pilihan_jawaban_d[$key],
                        'pilihan_jawaban_e' => $request->pilihan_jawaban_e[$key],
                        'kunci_jawaban' => $request->kunci_jawaban[$key],
                    ]);
                }
        
                DB::commit();
                return redirect()->route('isisoal.index')->with('success', 'Data soal berhasil diperbarui');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('isisoal.index')->with('failed', 'Gagal memperbarui data soal: ' . $e->getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(IsiSoal $isiSoal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IsiSoal $isiSoal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IsiSoal $isiSoal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IsiSoal $isiSoal)
    {
        //
    }
}
