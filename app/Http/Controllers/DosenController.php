<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::latest()->paginate(10);

        return view('dosen.index', compact('dosens'));
    }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|min:3',
            'nipd' => 'required|min:3|max:50|unique:dosens,nipd',
        ]);

        Dosen::create($validated);

        return redirect()->route('dosen.index');
    }

    public function show($id)
    {
        $dosen = Dosen::findOrFail($id);

        return view('dosen.show', compact('dosen'));
    }

    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);

        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|min:3',
            'nipd' => 'required|min:3|max:50|unique:dosens,nipd,'.$dosen->id,
        ]);

        $dosen->update($validated);

        return redirect()->route('dosen.index');
    }

    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();

        return redirect()->route('dosen.index');
    }
}
