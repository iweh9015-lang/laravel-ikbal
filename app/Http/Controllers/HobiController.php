<?php

namespace App\Http\Controllers;

use App\Models\Hobi;
use Illuminate\Http\Request;

class HobiController extends Controller
{
    public function index()
    {
        $hobis = Hobi::latest()->paginate(10);
        return view('hobi.index', compact('hobis'));
    }

    public function create()
    {
        return view('hobi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_hobi' => 'required|string|min:3|max:100|unique:hobis,nama_hobi',
        ]);

        Hobi::create($validated);

        return redirect()->route('hobi.index');
    }

    public function show($id)
    {
        $hobi = Hobi::findOrFail($id);
        return view('hobi.show', compact('hobi'));
    }

    public function edit($id)
    {
        $hobi = Hobi::findOrFail($id);
        return view('hobi.edit', compact('hobi'));
    }

    public function update(Request $request, $id)
    {
        $hobi = Hobi::findOrFail($id);

        $validated = $request->validate([
            'nama_hobi' => 'required|string|min:3|max:100|unique:hobis,nama_hobi,' . $hobi->id,
        ]);

        $hobi->update($validated);

        return redirect()->route('hobi.index');
    }

    public function destroy($id)
    {
        $hobi = Hobi::findOrFail($id);
        $hobi->delete();

        return redirect()->route('hobi.index');
    }
}
