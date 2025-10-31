@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="bi bi-info-circle me-1"></i> Detail Hobi</h5>
                    <div class="d-flex gap-2">
                        <a href="{{ route('hobi.edit', $hobi->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                        <a href="{{ route('hobi.index') }}" class="btn btn-sm btn-light border">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-3">Nama Hobi</dt>
                        <dd class="col-sm-9">{{ $hobi->nama_hobi }}</dd>

                        <dt class="col-sm-3">Dibuat</dt>
                        <dd class="col-sm-9">{{ $hobi->created_at?->format('d M Y, H:i') }}</dd>

                        <dt class="col-sm-3">Diupdate</dt>
                        <dd class="col-sm-9">{{ $hobi->updated_at?->format('d M Y, H:i') }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
