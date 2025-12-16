<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kota;
use App\Models\Propinsi;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kota = Kota::with('propinsi')->orderBy('id', 'DESC')->paginate(5); 

        return view('kota.index', compact('kota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $propinsi = Propinsi::pluck('nama_propinsi', 'id'); // Ambil semua data propinsi
        return view('kota.create', compact('propinsi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([ 
        'nama_kota' => 'required',
        'propinsi_id' => 'required',
      ]);

        Kota::create($request->all());

        return redirect()->route('kota.index')
            ->with('message', 'Kota baru berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $kota = Kota::findOrFail($id);
        $propinsi = Propinsi::pluck('nama_propinsi', 'id'); // Ambil semua data propinsi
        return view('kota.edit', compact('kota', 'propinsi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([ 
            'nama_kota' => 'required',
            'propinsi_id' => 'required',
        ]);
        $kota = Kota::findOrFail($id);
        $kota->update($request->all());
        return redirect()->route('kota.index')
            ->with('message', 'Kota berhasil diperbarui!');
    }
    /**
    * Remove the specified resource from storage.
    */
    public function destroy($id)
    {
     Kota::findOrFail($id)->delete();
    
     return redirect()->route('kota.index')
        ->with('message', 'Kota berhasil dihapus!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $kota = Kota::with('propinsi')->findOrFail($id);
        return view('kota.show', compact('kota'));
    }

}
