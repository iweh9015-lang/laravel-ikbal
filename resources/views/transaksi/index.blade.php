<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Transaksi | KasirPro</title>
    <style>
        :root {
            --primary: #3a7bd5;
            --primary-light: #64b3f4;
            --background: #f6f9ff;
            --card: #ffffff;
            --text-dark: #2e3a59;
            --text-light: #ffffff;
            --hover: rgba(58, 123, 213, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: var(--background);
            color: var(--text-dark);
            overflow-x: hidden;
            min-height: 100vh;
        }

        /* === Navbar === */
        header {
            background: linear-gradient(90deg, var(--primary), var(--primary-light));
            color: white;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 20px rgba(58, 123, 213, 0.25);
            position: sticky;
            top: 0;
            z-index: 50;
            animation: fadeInDown 0.8s ease;
        }

        header h1 {
            font-size: 22px;
            letter-spacing: 0.5px;
        }

        header nav a {
            color: white;
            text-decoration: none;
            margin: 0 14px;
            font-weight: 500;
            position: relative;
            transition: 0.3s;
        }

        header nav a::after {
            content: "";
            position: absolute;
            width: 0%;
            height: 2px;
            left: 0;
            bottom: -5px;
            background: white;
            transition: width 0.3s ease;
        }

        header nav a:hover::after,
        header nav a.active::after {
            width: 100%;
        }

        header nav a:hover {
            opacity: 0.9;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* === Content === */
        .container {
            padding: 30px 60px;
            animation: fadeIn 1s ease;
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

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .topbar h2 {
            font-size: 24px;
            color: var(--primary);
            font-weight: 600;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 4px 12px rgba(58, 123, 213, 0.3);
        }

        .btn-primary:hover {
            background: var(--primary-light);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(58, 123, 213, 0.4);
        }

        /* === Search Box === */
        .search-box {
            margin-bottom: 20px;
        }

        .search-box input {
            width: 100%;
            padding: 12px 15px;
            border-radius: 10px;
            border: 1px solid #d7e3fc;
            font-size: 15px;
            outline: none;
            transition: 0.3s;
        }

        .search-box input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 8px rgba(58, 123, 213, 0.3);
        }

        /* === Table === */
        .card {
            background: var(--card);
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(58, 123, 213, 0.12);
            overflow: hidden;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: var(--primary);
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: 500;
            font-size: 15px;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #e9f1ff;
        }

        tr:hover {
            background: #f2f7ff;
            transition: 0.2s;
        }

        .badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 13px;
            background: #e8fff0;
            color: #1f9c58;
            font-weight: 500;
        }

        .aksi {
            display: flex;
            gap: 10px;
        }

        .btn-action {
            border: none;
            background: none;
            cursor: pointer;
            padding: 6px 8px;
            border-radius: 6px;
            transition: all 0.3s;
        }

        .btn-action:hover {
            background: var(--hover);
            transform: scale(1.1);
        }

    </style>
</head>
<body>
    <header>
        <h1>💼 KasirPro</h1>
        <nav>
            <a href="{{ route('transaksi.index') }}" class="active">Transaksi</a>
            <a href="{{ route('pelanggan.index') }}">Pelanggan</a>
            <a href="{{ route('prodak.index') }}">Produk</a>
        </nav>
    </header>

    <div class="container">
        <div class="topbar">
            <h2>📋 Daftar Transaksi</h2>
            <a href="{{ route('transaksi.create') }}">
                <button class="btn-primary">+ Tambah Transaksi</button>
            </a>
        </div>

        <div class="search-box">
            <input type="text" id="search" placeholder="🔍 Cari transaksi...">
        </div>

        <div class="card">
            <table id="tableTransaksi">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pelanggan</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Metode</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach($transaksis as $index => $transaksi)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $transaksi->pelanggan->nama }}</td>
                        <td>{{ $transaksi->tanggal }}</td>
                        <td>Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                        <td>{{ ucfirst($transaksi->pembayaran->metode ?? '-') }}</td>
                        <td><span class="badge">Lunas</span></td>
                        <td class="aksi">
                            <a href="{{ route('transaksi.show', $transaksi->id) }}" class="btn-action">👁️</a>
                            <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn-action">✏️</a>
                            <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus transaksi ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action">🗑️</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Live Search
        document.getElementById("search").addEventListener("keyup", function() {
            const filter = this.value.toLowerCase();
            document.querySelectorAll("#tableBody tr").forEach((tr) => {
                tr.style.display = tr.textContent.toLowerCase().includes(filter) ?
                    "" :
                    "none";
            });
        });

    </script>
</body>
</html>
