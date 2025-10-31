@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #ffffffff 0%, #727272ff 100%, #000000ff 100%);
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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    Ini Diaa!!!
                    <a href="{{ route('wali.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                </div>

                <div class="card-body">

                    <h4 class="fw-bold">{{ $wali->nama }}</h4>
                    <p><strong>Mahasiswa :</strong> {{ $wali->mahasiswa->nama }}</p>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container py-5">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <svg class="bi" width="30" height="24">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
            <span class="text-muted">Ikbal alimmuiiawan XI RPL 3 </span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
                        <use xlink:href="#twitter"></use>
                    </svg></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
                        <use xlink:href="#instagram"></use>
                    </svg></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
                        <use xlink:href="#facebook"></use>
                    </svg></a></li>
        </ul>
    </footer>
</div>

@endsection
