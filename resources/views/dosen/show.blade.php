@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Dosen</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" value="{{ $dosen->nama }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NIPD</label>
                        <input type="text" class="form-control" value="{{ $dosen->nipd }}" disabled>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
