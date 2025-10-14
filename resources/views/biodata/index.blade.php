@extends('layouts.app')

@section('content')
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="mb-3">
    <a href="{{ route('biodata.create') }}" class="btn btn-primary">+ Tambah Biodata</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Tinggi</th>
            <th>Berat</th>
            <th>Foto</th>
            <th width="160">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($biodatas as $bio)
        <tr>
            <td>{{ $bio->nama }}</td>
            <td>{{ $bio->jk }}</td>
            <td>{{ $bio->agama }}</td>
            <td>{{ $bio->tinggi_badan }}</td>
            <td>{{ $bio->berat_badan }}</td>
            <td>
                @if($bio->foto)
                <img src="{{ asset('storage/'.$bio->foto) }}" width="60">
                @endif
            </td>
            <td>
                <a href="{{ route('biodata.edit', $bio->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('biodata.destroy', $bio->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

