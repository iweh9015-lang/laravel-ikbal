<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi - {{ $transaksi->kode_transaksi }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e9f2ff, #f7fbff);
            color: #1c2b4a;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .page-wrapper {
            width: 95%;
            margin: 40px auto;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        h1 {
            font-size: 28px;
            color: #2657a4;
            font-weight: 600;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: 0.3s ease;
        }

        .btn-back {
            background: #2b6fe1;
            color: white;
            box-shadow: 0 3px 8px rgba(43, 111, 225, 0.25);
        }

        .btn-back:hover {
            transform: translateY(-2px);
            background: #1f56b9;
        }

        .content {
            display: flex;
            gap: 30px;
        }

        .left-panel,
        .right-panel {
            flex: 1;
        }

        .card {
            background: #fff;
            border-radius: 18px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 8px 25px rgba(0, 85, 255, 0.08);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-3px);
        }

        h2 {
            font-size: 20px;
            color: #2657a4;
            border-bottom: 2px solid #e6eeff;
            padding-bottom: 8px;
            margin-bottom: 18px;
        }

        .info p {
            margin: 6px 0;
        }

        .no-payment {
            color: #888;
            font-style: italic;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            background: #f1f6ff;
            color: #2657a4;
            padding: 10px;
            border-radius: 8px 8px 0 0;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #eaf0ff;
        }

        tr:hover {
            background-color: #f9fbff;
        }

        .payment-card {
            background: #f8fbff;
            border-left: 5px solid #2b6fe1;
        }

        .detail-card {
            background: #ffffff;
            border-left: 5px solid #2657a4;
        }

        @media (max-width: 900px) {
            .content {
                flex-direction: column;
            }
        }

    </style>
</head>
<body>
    <div class="page-wrapper">
        <header>
            <h1>🧾 Detail Transaksi</h1>
            <a href="{{ route('transaksi.index') }}" class="btn btn-back">← Kembali</a>
        </header>

        <div class="content">
            <!-- Kiri: Info Transaksi -->
            <div class="left-panel">
                <div class="card info-card">
                    <h2>Informasi Transaksi</h2>
                    <div class="info">
                        <p><strong>Kode:</strong> {{ $transaksi->kode_transaksi }}</p>
                        <p><strong>Tanggal:</strong> {{ $transaksi->tanggal }}</p>
                        <p><strong>Pelanggan:</strong> {{ $transaksi->pelanggan->nama ?? '-' }}</p>
                        <p><strong>Total Harga:</strong> Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
                    </div>
                </div>

                <div class="card payment-card">
                    <h2>💳 Pembayaran</h2>
                    @if($transaksi->pembayaran)
                    <p><strong>Metode:</strong> {{ ucfirst($transaksi->pembayaran->metode) }}</p>
                    <p><strong>Jumlah Bayar:</strong> Rp {{ number_format($transaksi->pembayaran->jumlah_bayar, 0, ',', '.') }}</p>
                    <p><strong>Kembalian:</strong> Rp {{ number_format($transaksi->pembayaran->kembalian, 0, ',', '.') }}</p>
                    @else
                    <p class="no-payment">Belum ada data pembayaran.</p>
                    @endif
                </div>
            </div>

            <!-- Kanan: Detail Produk -->
            <div class="right-panel">
                <div class="card detail-card">
                    <h2>🛍️ Detail Produk</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaksi->detailtransaksi as $detail)
                            <tr>
                                <td>{{ $detail->prodak->nama_prodak ?? '-' }}</td>
                                <td>Rp {{ number_format($detail->prodak->harga, 0, ',', '.') }}</td>
                                <td>{{ $detail->jumlah }}</td>
                                <td>Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
