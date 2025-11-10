<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Pelanggan;
use App\Models\DetailTransaksi;
use App\Models\Pembayaran;
use App\Models\Prodak;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('pelanggan')->latest()->get();
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        $prodaks = Prodak::all();
        return view('transaksi.create', compact('pelanggans', 'prodaks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'tanggal' => 'required|date',
            'prodak_id.*' => 'required|exists:prodaks,id',
            'jumlah.*' => 'required|integer|min:1',
            'metode' => 'required',
            'jumlah_bayar' => 'required|numeric|min:0'
        ]);

        // 1️⃣ Buat transaksi utama
        $transaksi = Transaksi::create([
            'kode_transaksi' => 'TRX-' . strtoupper(Str::random(6)),
            'tanggal' => $request->tanggal,
            'pelanggan_id' => $request->pelanggan_id,
            'total_harga' => 0
        ]);

        $total = 0;

        // 2️⃣ Simpan detail transaksi per pro$prodak
        foreach ($request->produk_id as $index => $prodak_id) {
            $prodak = Prodak::findOrFail($prodak_id);
            $jumlah = $request->jumlah[$index];
            $subtotal = $prodak->harga * $jumlah;

            DetailTransaksi::create([
                'transaksi_id' => $transaksi->id,
                'prodak_id' => $prodak->id,
                'jumlah' => $jumlah,
                'subtotal' => $subtotal
            ]);

            // kurangi stok pro$prodak
            $prodak->decrement('stok', $jumlah);

            $total += $subtotal;
        }

        // 3️⃣ Update total harga transaksi
        $transaksi->update(['total_harga' => $total]);

        // 4️⃣ Simpan pembayaran
        $kembalian = $request->jumlah_bayar - $total;

        Pembayaran::create([
            'transaksi_id' => $transaksi->id,
            'metode' => $request->metode,
            'jumlah_bayar' => $request->jumlah_bayar,
            'kembalian' => $kembalian
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan');
    }

   public function show(Transaksi $transaksi)
{
    $transaksi->load(['pelanggan', 'detailtransaksi.prodak', 'pembayaran']);
    return view('transaksi.show', compact('transaksi'));
}

    public function edit(Transaksi $transaksi)
    {
        $pelanggans = Pelanggan::all();
        $prodaks = Prodak::all();
        $transaksi->load('detailtransaksi');
        return view('transaksi.edit', compact('transaksi', 'pelanggans', 'prodaks'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        // Untuk contoh sederhana, update hanya tanggal & pelanggan
        $request->validate([
            'tanggal' => 'required|date',
            'pelanggan_id' => 'required'
        ]);

        $transaksi->update($request->only(['tanggal', 'pelanggan_id']));

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus');
    }
}