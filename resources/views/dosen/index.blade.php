@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">          
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Data Dosen</span>
                    <a href="{{ route('dosen.create') }}" class="btn btn-sm btn-outline-primary">Tambah Dosen</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIPD</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = ($dosens->currentPage() - 1) * $dosens->perPage() + 1; @endphp
                                @forelse ($dosens as $dosen)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $dosen->nama }}</td>
                                        <td>{{ $dosen->nipd }}</td>
                                        <td>
                                            <form action="{{ route('dosen.destroy', $dosen->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('dosen.show', $dosen->id) }}" class="btn btn-sm btn-outline-dark">Show</a>
                                                <a href="{{ route('dosen.edit', $dosen->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
                                                <button type="submit" onclick="return confirm('Hapus data ini?')" class="btn btn-sm btn-outline-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Data belum tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {!! $dosens->withQueryString()->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection