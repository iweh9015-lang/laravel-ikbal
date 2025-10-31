@extends('layouts.app')
@section('content')
<style>
    body {
        background: linear-gradient(135deg, #ffffffff 0%, #395dffff 100%);
        animation: moveGradient 6s ease infinite;
        min-height: 100vh;
        font-family: 'Poppins', sans-serif;
    }

    .container {
        margin-top: 50px;
        margin-bottom: 50px;
    }

    .card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        background: #fff;
        overflow: hidden;
        transition: all 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 14px 35px rgba(0, 0, 0, 0.12);
    }

    .card-header {
        background: linear-gradient(90deg, #007bff, #67d9ffff);
        animation: moveGradient 6s ease infinite;
        color: white;
        font-weight: 600;
        font-size: 1.1rem;
        padding: 15px 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-body {
        padding: 30px;
    }

    .card-body h4 {
        font-weight: 700;
        color: #333;
    }

    .card-body p {
        color: #555;
        font-size: 16px;
        margin-top: 10px;
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

    .info-box {
        background: #f9fbff;
        border-radius: 12px;
        padding: 20px;
        border-left: 5px solid #007bff;
        margin-top: 20px;
    }

    .info-label {
        font-weight: 600;
        color: #007bff;
        margin-bottom: 5px;
    }

    .info-value {
        font-size: 17px;
        color: #333;
    }

    footer {
        text-align: center;
        color: #888;
        margin-top: 40px;
        font-size: 14px;
    }

</style>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">Detail Pelanggan</div>
                <div class="card-body">
                    <p><strong>Nama:</strong> {{ $pelanggan->nama }}</p>
                    <td>{{ $pelanggan->telepon }}</td>
                    <p><strong>Alamat:</strong> {{ $pelanggan->alamat }}</p>

                    <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

