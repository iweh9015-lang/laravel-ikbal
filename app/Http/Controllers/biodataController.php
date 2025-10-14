<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BiodataController extends Controller
{
    public function index()
    {
        $biodatas = Biodata::latest()->get();
        return view('biodata.index', compact('biodatas'));
    }

    public function create()
    {
        return view('biodata.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tgl_lahir' => 'required|date',
            'jk' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'tinggi_badan' => 'required|numeric',
            'berat_badan' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto', 'public');
        }

        Biodata::create($data);

        return redirect()->route('biodata.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $biodata = Biodata::findOrFail($id);
        return view('biodata.edit', compact('biodata'));
    }

    public function update(Request $request, $id)
    {
        $biodata = Biodata::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'tgl_lahir' => 'required|date',
            'jk' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'tinggi_badan' => 'required|numeric',
            'berat_badan' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($biodata->foto) {
                Storage::disk('public')->delete($biodata->foto);
            }
            $data['foto'] = $request->file('foto')->store('foto', 'public');
        }

        $biodata->update($data);

        return redirect()->route('biodata.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $biodata = Biodata::findOrFail($id);
        if ($biodata->foto) {
            Storage::disk('public')->delete($biodata->foto);
        }
        $biodata->delete();

        return redirect()->route('biodata.index')->with('success', 'Data berhasil dihapus.');
    }
}
