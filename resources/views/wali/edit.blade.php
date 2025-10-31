@extends('layouts.app')
@section('content')

<style>
    body {
        background: linear-gradient(135deg, #ffffffff 0%, #5e5e5eff 100%);
        animation: moveGradient 6s ease infinite;
        min-height: 100vh;
        font-family: 'Poppins', sans-serif;
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
        background: linear-gradient(270deg, #ffffffff, #00c6ff, #ffffffff);
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


<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">Edit Data Wali</div>
                <div class="card-body">
                    <form action="{{ route('wali.update', $wali->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="">Nama Wali</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $wali->nama }}">
                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong> {{ $message }} </strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Mahasiswa</label>
                            <select name="id_mahasiswa" class="form-control @error('id_mahasiswa') is-invalid @enderror" id="">
                                @foreach ($mahasiswa as $data)
                                <option value="{{ $data->id }}" {{ $data->id == $wali->id_mahasiswa ? 'selected' : '' }}>
                                    {{ $data->nama }}
                                </option>
                                @endforeach
                            </select>
                            @error('id_mahasiswa')
                            <span class="invalid-feedback" role="alert">
                                <strong> {{ $message }} </strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-block btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
