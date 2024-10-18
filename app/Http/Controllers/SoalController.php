<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $row = Soal::orderBy('id', 'DESC')->get();
        $data = array(
            'link' => 'soal',
            'script' => 'soal/script'
        );
		return view('soal/index', compact('row'))->with($data);
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
        $request->validate([
            'kategori_soal' => 'required',
            'keterangan_soal' => 'required',
        ]);
        try{
            $simpan = Soal::create($request->all());
            // return Response::json($simpan);
            return response()->json([
                'status' => 'success',
            ]);
        }catch(\Exception $e){
            return response()->json([
                'status' => 'failed',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id =  $request->input('id');
        $q = Soal::where('id', $id)->first();
        return $q->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Soal $soal)
    {
        $id =  $request->input('id');
        $kategori_soal =  $request->input('kategori_soal');
        $keterangan_soal =  $request->input('keterangan_soal');
        try{
            $simpan = Soal::where('id', $id)
            ->update(['kategori_soal'=>$kategori_soal,'keterangan_soal'=>$keterangan_soal]);
            // return Response::json($simpan);
            return response()->json([
                'status' => 'success',
            ]);
        }catch(\Exception $e){
            return response()->json([
                'status' => 'failed',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id =  $request->input('id');
        try{
            $simpan = Soal::where('id', $id)->delete();
            // return Response::json($simpan);
            return response()->json([
                'status' => 'success',
            ]);
        }catch(\Exception $e){
            return response()->json([
                'status' => 'failed',
            ]);
        }
    }
}
