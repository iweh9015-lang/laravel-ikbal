@extends('layouts.app')

@section('content')
<style>
    body {
         background: linear-gradient(270deg, #ffffffff, #626161ff);
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
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-start ">
                        Dosen
                    </div>
                    <div class="float-end">
                        <a href="{{ route('wali.create') }}" class="btn btn-sm btn-outline-primary">Tambah Data</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Daftar Nama Wali</th>
                                    <th>Nama Siswa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @forelse ($walis as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->mahasiswa->nama }}</td>
                                    <td>
                                        <form action="{{ route('wali.destroy', $data->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('wali.show', $data->id) }}" class="btn btn-sm btn-outline-dark">Show</a> |
                                            <a href="{{ route('wali.edit', $data->id) }}" class="btn btn-sm btn-outline-success">Edit</a> |
                                            <button type="submit" onclick="return confirm('Are You Sure ?');" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        Data data belum Tersedia.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
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
            <span class="text-muted">Ikbal alimmujiawan XI RPL 3 </span>
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
