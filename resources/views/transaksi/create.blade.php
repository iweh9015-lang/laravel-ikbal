<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi | Sistem Kasir</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Inter:wght@400;500&display=swap');

        :root {
            --primary: #2979ff;
            --light: #eaf2ff;
            --background: #f7faff;
            --text: #1f2d4d;
            --card: #ffffff;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--background);
            color: var(--text);
            margin: 0;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        .app-container {
            display: flex;
            width: 100%;
            height: 100%;
        }

        /* Sidebar */
        .sidebar {
            width: 240px;
            background: var(--primary);
            color: white;
            display: flex;
            flex-direction: column;
            padding: 30px 20px;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 30px;
        }

        .logo span {
            color: #c8e1ff;
        }

        .nav-link {
            display: block;
            padding: 12px 15px;
            border-radius: 8px;
            color: white;
            text-decoration: none;
            font-weight: 500;
            margin-bottom: 8px;
            transition: background 0.2s;
        }

        .nav-link:hover,
        .nav-link.active {
            background: rgba(255, 255, 255, 0.15);
        }

        /* Main */
        .content {
            flex: 1;
            padding: 40px 60px;
            overflow-y: auto;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
        }

        .page-header h1 {
            font-size: 26px;
            color: var(--primary);
            font-weight: 600;
        }

        .subtitle {
            color: #6b7b9f;
            font-size: 14px;
            margin-top: 4px;
        }

        /* Card Form */
        .form-card {
            background: var(--card);
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(41, 121, 255, 0.08);
            padding: 30px;
            animation: fadeUp 0.6s ease-in-out;
        }

        .section {
            margin-bottom: 25px;
        }

        .section-title {
            font-size: 18px;
            color: var(--primary);
            margin-bottom: 15px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 6px;
            font-weight: 500;
            color: #374b72;
        }

        input,
        select {
            padding: 10px 14px;
            border: 1px solid #d6e3ff;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.2s ease;
        }

        input:focus,
        select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(41, 121, 255, 0.15);
            outline: none;
        }

        .produk-wrapper {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .produk-item {
            display: flex;
            gap: 10px;
        }

        .btn {
            display: inline-block;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            transition: 0.3s;
            text-decoration: none;
            padding: 10px 18px;
            font-family: 'Poppins', sans-serif;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            box-shadow: 0 3px 10px rgba(41, 121, 255, 0.3);
        }

        .btn-primary:hover {
            background: #1f5ed4;
        }

        .btn-secondary {
            background: var(--light);
            color: var(--primary);
            margin-top: 1%;
        }

        .btn-secondary:hover {
            background: #d8e7ff;
        }

        .btn-back {
            background: #edf3ff;
            color: var(--primary);
        }

        .btn-back:hover {
            background: #d9e7ff;
        }

        .form-actions {
            text-align: right;
            margin-top: 30px;
        }

        @keyframes fadeUp {
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
</head>
<body>
    <div class="app-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2 class="logo">Kasir<span>Pro</span></h2>
            <nav>
                <a href="{{ route('transaksi.create') }}" class="nav-link active">📦 Transaksi</a>
                <a href="{{ route('pelanggan.create') }}" class="nav-link">👤 Pelanggan</a>
                <a href="{{ route('prodak.create') }}" class="nav-link">🧰 Produk</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="content">
            <header class="page-header">
                <div>
                    <h1>Tambah Transaksi</h1>
                    <p class="subtitle">Masukkan detail transaksi dengan lengkap</p>
                </div>
                <a href="{{ route('transaksi.index') }}" class="btn btn-back">← Kembali</a>
            </header>

            <form action="{{ route('transaksi.store') }}" method="POST" class="form-card">
                @csrf

                <section class="section">
                    <h2 class="section-title">🧍 Data Pelanggan</h2>
                    <div class="grid">
                        <div class="form-group">
                            <label>Pelanggan</label>
                            <select name="pelanggan_id" required>
                                <option value="">-- Pilih Pelanggan --</option>
                                @foreach($pelanggans as $p)
                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Transaksi</label>
                            <input type="date" name="tanggal" required>
                        </div>
                    </div>
                </section>

                <section class="section">
                    <h2 class="section-title">🛍️ Produk Dibeli</h2>
                    <div id="produk-list" class="produk-wrapper">
                        <div class="produk-item">
                            <select name="produk_id[]" required>
                                <option value="">-- Pilih Produk --</option>
                                @foreach($prodaks as $prodak)
                                <option value="{{ $prodak->id }}">{{ $prodak->nama_prodak }} — Rp {{ number_format($prodak->harga, 0, ',', '.') }}</option>
                                @endforeach
                            </select>
                            <input type="number" name="jumlah[]" min="1" placeholder="Jumlah" required>
                        </div>
                    </div>
                    <button type="button" id="add-produk" class="btn btn-secondary">+ Tambah Produk</button>
                </section>

                <section class="section">
                    <h2 class="section-title">💳 Pembayaran</h2>
                    <div class="grid">
                        <div class="form-group">
                            <label>Metode Pembayaran</label>
                            <select name="metode" required>
                                <option value="">-- Pilih Metode --</option>
                                <option value="cash">Cash</option>
                                <option value="transfer">Transfer</option>
                                <option value="qris">QRIS</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Bayar</label>
                            <input type="number" name="jumlah_bayar" placeholder="Masukkan nominal" min="0" required>
                        </div>
                    </div>
                </section>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">💾 Simpan Transaksi</button>
                </div>
            </form>
        </main>
    </div>

    <script>
        document.getElementById('add-produk').addEventListener('click', () => {
            const wrapper = document.getElementById('produk-list');
            const item = document.querySelector('.produk-item').cloneNode(true);
            item.querySelectorAll('input, select').forEach(e => e.value = '');
            wrapper.appendChild(item);
        });

    </script>
</body>
</html>
