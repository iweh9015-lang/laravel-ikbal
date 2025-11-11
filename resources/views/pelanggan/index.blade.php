@extends('layouts.app')
@section('content')
<style>
    body {
        background: linear-gradient(270deg, #ffffffff, #4586ffff);
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


<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">💁🏻‍♂️Data Pelanggan</div>

                <div class="card-body">
                    <a href="{{ route('pelanggan.create') }}" class="btn btn-success mb-3">👥 Tambah Pelanggan</a>


                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No Telp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pelanggan as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->alamat }}</td> 
                                <td>{{ $p->no_telepon }}</td>
                                <td>
                                    <a href="{{ route('pelanggan.show', $p->id) }}" class="btn btn-primary btn-sm">👀</a> |


                                    <a href="{{ route('pelanggan.edit', $p->id) }}" class="btn btn-info btn-sm">✍️</a> |

                                    <form action="{{ route('pelanggan.destroy', $p->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">🗑</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

