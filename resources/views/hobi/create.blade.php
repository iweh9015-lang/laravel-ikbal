@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-xl-6">
            <div class="card">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Tambah Hobi</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('hobi.store') }}" method="POST" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Hobi</label>
                            <input type="text" name="nama_hobi" class="form-control form-control-lg @error('nama_hobi') is-invalid @enderror" value="{{ old('nama_hobi') }}" placeholder="Contoh: Membaca, Olahraga, Musik">
                            @error('nama_hobi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('hobi.index') }}" class="btn btn-light border">Kembali</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
