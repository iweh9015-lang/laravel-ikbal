@extends('layouts.app')

@section('content')
<div class="card p-4">
    <h4>Edit Biodata</h4>
    <form action="{{ route('biodata.update', $biodata->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ $biodata->nama }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" value="{{ $biodata->tgl_lahir }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Jenis Kelamin</label><br>
            <input type="radio" name="jk" value="Laki-laki" {{ $biodata->jk == 'Laki-laki' ? 'checked' : '' }}> Laki-laki
            <input type="radio" name="jk" value="Perempuan" {{ $biodata->jk == 'Perempuan' ? 'checked' : '' }}> Perempuan
        </div>

        <div class="mb-3">
            <label>Agama</label>
            <select name="agama" class="form-select">
                <option {{ $biodata->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                <option {{ $biodata->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                <option {{ $biodata->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                <option {{ $biodata->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                <option {{ $biodata->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                <option {{ $biodata->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" rows="3">{{ $biodata->alamat }}</textarea>
        </div>

        <div class="mb-3">
            <label>Tinggi Badan (cm)</label>
            <input type="number" name="tinggi_badan" value="{{ $biodata->tinggi_badan }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Berat Badan (kg)</label>
            <input type="number" name="berat_badan" value="{{ $biodata->berat_badan }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Foto</label><br>
            @if($biodata->foto)
            <img src="{{ asset('storage/'.$biodata->foto) }}" width="80"><br><br>
            @endif
            <input type="file" name="foto" class="form-control">
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('biodata.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

