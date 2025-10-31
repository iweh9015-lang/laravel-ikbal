@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-xl-6">
            <div class="card">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Hobi</h5>
                    <a href="{{ route('hobi.index') }}" class="btn btn-sm btn-light border"><i class="bi bi-arrow-left"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('hobi.update', $hobi->id) }}" method="POST" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Hobi</label>
                            <input type="text" name="nama_hobi" class="form-control form-control-lg @error('nama_hobi') is-invalid @enderror" value="{{ old('nama_hobi', $hobi->nama_hobi) }}" placeholder="Contoh: Membaca">
                            @error('nama_hobi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button type="reset" class="btn btn-light border">Reset</button>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check2-square me-1"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
