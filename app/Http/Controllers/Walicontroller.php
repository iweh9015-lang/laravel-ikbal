<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Wali;
use Illuminate\Http\Request;

class WaliController extends Controller
{
    public function index()
    {
        $walis = Wali::latest()->get();

        return view('wali.index', compact('walis'));
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::all();

        return view('wali.create', compact('mahasiswas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                'nama' => 'required',
                'id_mahasiswa' => 'required|exists:mahasiswas,id',
            ]
        );

        $wali = new Wali();
        $wali->nama = $request->nama;
        $wali->id_mahasiswa = $request->id_mahasiswa;
        $wali->save();

        return redirect()->route('wali.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $wali = Wali::findOrFail($id);

        return view('wali.show', compact('wali'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $wali = Wali::findOrFail($id);
        $mahasiswa = Mahasiswa::all();

        return view('wali.edit', compact('wali', 'mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate(
            [
                'nama' => 'required',
                'id_mahasiswa' => 'required|exists:mahasiswas,id',
            ]
        );

        $wali = Wali::findOrFail($id);
        $wali->nama = $request->nama;
        $wali->id_mahasiswa = $request->id_mahasiswa;
        $wali->save();

        return redirect()->route('wali.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $wali = Wali::findOrFail($id);
        $wali->delete();

        return redirect()->route('wali.index');
    }
}
