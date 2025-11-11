@extends('layouts.app')
<style>
    body {
        background: linear-gradient(270deg, #ffffffff, #c0c0c0ff);
        background-size: 600% 600%;
        font-weight: 600;
        font-size: 1.1rem;
        animation: moveGradient 6s ease infinite;
        color: white;
        padding: 10px 20px;
        border-radius: 20px 20px 0 0;
    }

    @keyframes moveGradient {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }

    }

    .container {
        margin-top: 40px;
        margin-bottom: 40px;
    }

    .card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        background: #fff;
        transition: all 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
    }

    .card-header {
        background: linear-gradient(270deg, #00a2ffff, #76a9e3ff);
        background-size: 600% 600%;
        font-weight: 600;
        font-size: 1.1rem;
        animation: moveGradient 6s ease infinite;
        color: white;
        padding: 10px 20px;
        border-radius: 20px 20px 0 0;
    }

    @keyframes moveGradient {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }

    }


    .btn-outline-primary {
        border-radius: 10px;
        transition: 0.3s;
    }

    .btn-outline-primary:hover {
        background-color: #fff;
        color: #007bff;
        transform: scale(1.05);
    }

    .table {
        border-collapse: separate;
        border-spacing: 0 8px;
        margin-top: 10px;
    }

    .table thead {
        background-color: #007bff;
        color: white;
    }

    .table th {
        text-align: center;
        padding: 12px;
        border: none;
    }

    .table td {
        background-color: #fff;
        text-align: center;
        padding: 10px;
        border-top: 1px solid #eee;
    }

    .table tbody tr {
        transition: all 0.2s;
    }

    .table tbody tr:hover {
        background-color: #f8f9ff;
        transform: scale(1.01);
    }

    .btn {
        border-radius: 8px;
        font-weight: 500;
    }

    .btn-info {
        background-color: #17a2b8;
        border: none;
    }

    .btn-info:hover {
        background-color: #138496;
    }

    .btn-success {
        background-color: #28a745;
        border: none;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    footer {
        margin-top: 40px;
        text-align: center;
        color: #777;
        font-size: 14px;
    }

</style>

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data Pembayaran</h5>
            <a href="{{ route('pembayaran.create') }}" class="btn btn-light btn-sm">+ Tambah Pembayaran</a>
        </div>

        <div class="card-body">
            {{-- Search --}}
            <form action="{{ route('pembayaran.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari kode transaksi..." value="{{ $search }}">
                    <button class="btn btn-outline-primary" type="submit">Cari</button>
                    @if($search)
                    <a href="{{ route('pembayaran.index') }}" class="btn btn-outline-secondary">Reset</a>
                    @endif
                </div>
            </form>

            {{-- Alert sukses --}}
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            {{-- Table --}}
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Kode Transaksi</th>
                            <th>Nama Pelanggan</th>
                            <th>Tanggal Bayar</th>
                            <th>Metode</th>
                            <th>Jumlah Bayar</th>
                            <th>Kembalian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pembayarans as $pembayaran)
                        <tr>
                            <td>{{ $loop->iteration + ($pembayarans->currentPage() - 1) * $pembayarans->perPage() }}</td>
                            <td>{{ $pembayaran->transaksi->kode_transaksi ?? '-' }}</td>
                            <td>{{ $pembayaran->transaksi->pelanggan->nama ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($pembayaran->tanggal_bayar)->format('d M Y') }}</td>
                            <td>
                                <span class="badge bg-{{ $pembayaran->metode_pembayaran == 'cash' ? 'success' : ($pembayaran->metode_pembayaran == 'credit' ? 'warning' : 'info') }}">
                                    {{ ucfirst($pembayaran->metode_pembayaran) }}
                                </span>
                            </td>
                            <td>Rp {{ number_format($pembayaran->jumlah_bayar, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($pembayaran->kembalian, 0, ',', '.') }}</td>
                            <td class="text-center">
                                <a href="{{ route('pembayaran.show', $pembayaran->id) }}" class="btn btn-sm btn-info text-white">
                                    Show
                                </a>
                                <a href="{{ route('pembayaran.edit', $pembayaran->id) }}" class="btn btn-sm btn-warning text-white">
                                    Edit
                                </a>
                                <form action="{{ route('pembayaran.destroy', $pembayaran->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">Tidak ada data pembayaran</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="mt-3">
                {{ $pembayarans->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
