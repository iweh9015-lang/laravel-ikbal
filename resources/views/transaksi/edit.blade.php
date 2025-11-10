
@extends('layouts.app')

@section('content')
<style>
    /* 🌈 Transaksi Style Level 50 */

    :root {
        --primary: #6c63ff;
        --secondary: #f3f4ff;
        --accent: #00b894;
        --danger: #ff7675;
        --radius: 14px;
        --transition: all 0.3s ease;
        --shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        --font-main: 'Poppins', sans-serif;
    }

    body {
        font-family: var(--font-main);
        background: linear-gradient(135deg, #f9faff, #f3f4ff);
        min-height: 100vh;
        padding: 40px;
    }

    /* Header */
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .header h1 {
        font-size: 2rem;
        font-weight: 600;
        color: #2d2d2d;
    }

    .btn-primary,
    .btn-secondary {
        padding: 10px 22px;
        border-radius: var(--radius);
        font-weight: 500;
        border: none;
        cursor: pointer;
        transition: var(--transition);
    }

    .btn-primary {
        background: var(--primary);
        color: #fff;
        box-shadow: var(--shadow);
    }

    .btn-primary:hover {
        background: #5a54e0;
        transform: translateY(-2px);
    }

    .btn-secondary {
        background: #fff;
        border: 2px solid var(--primary);
        color: var(--primary);
    }

    .btn-secondary:hover {
        background: var(--primary);
        color: #fff;
    }

    /* Card Container */
    .card {
        background: #fff;
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        padding: 30px;
        animation: fadeIn 0.6s ease;
    }

    /* Form Elements */
    .form-container {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .form-group label {
        font-weight: 600;
        color: #444;
        margin-bottom: 6px;
        display: block;
    }

    input,
    select {
        width: 100%;
        padding: 12px 14px;
        border-radius: var(--radius);
        border: 1.8px solid #e2e2e2;
        background: #f9f9ff;
        transition: var(--transition);
    }

    input:focus,
    select:focus {
        border-color: var(--primary);
        background: #fff;
        outline: none;
        box-shadow: 0 0 8px rgba(108, 99, 255, 0.2);
    }

    /* Produk Detail Box */
    .produk-card {
        background: var(--secondary);
        border-radius: var(--radius);
        padding: 16px 18px;
        margin-bottom: 10px;
        border: 1px solid #e2e2e2;
        transition: var(--transition);
    }

    .produk-card:hover {
        transform: scale(1.02);
        background: #e9eaff;
    }

    /* Form Actions */
    .form-actions {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .alert {
        padding: 15px;
        border-radius: var(--radius);
        color: #fff;
        background: var(--danger);
        margin-bottom: 20px;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(15px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

</style>

<div class="header">
    <h1>Edit Transaksi</h1>
    <a href="{{ route('transaksi.index') }}" class="btn-primary">← Kembali</a>
</div>

<div class="card" style="padding: 30px; max-width: 850px; margin: 0 auto;">
    @if ($errors->any())
    <div class="alert" style="background: var(--danger);">
        <ul style="margin-left: 20px;">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST" class="form-container">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Pelanggan</label>
            <select name="pelanggan_id" required>
                @foreach ($pelanggans as $pelanggan)
                <option value="{{ $pelanggan->id }}" {{ $pelanggan->id == $transaksi->pelanggan_id ? 'selected' : '' }}>
                    {{ $pelanggan->nama }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Tanggal Transaksi</label>
            <input type="date" name="tanggal" value="{{ $transaksi->tanggal }}" required>
        </div>

        <div class="form-group">
            <label>Detail Produk</label>
            @foreach ($transaksi->detailtransaksi as $detail)
            <div class="produk-card">
                <p><strong>{{ $detail->prodak->nama }}</strong></p>
                <p>Jumlah: {{ $detail->jumlah }}</p>
                <p>Subtotal: Rp{{ number_format($detail->subtotal, 0, ',', '.') }}</p>
            </div>
            @endforeach
        </div>

        <div class="form-group">
            <label>Total Harga</label>
            <input type="text" value="Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }}" readonly>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-primary">💾 Simpan Perubahan</button>
            <a href="{{ route('transaksi.index') }}" class="btn-secondary">Batal</a>
        </div>
    </form>
</div>


@endsection
