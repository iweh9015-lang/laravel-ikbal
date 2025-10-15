@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Detail Hobi</span>
                    <a href="{{ route('hobi.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                </div>
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-3">Nama Hobi</dt>
                        <dd class="col-sm-9">{{ $hobi->nama_hobi }}</dd>

                        <dt class="col-sm-3">Dibuat</dt>
                        <dd class="col-sm-9">{{ $hobi->created_at?->format('d-m-Y H:i') }}</dd>

                        <dt class="col-sm-3">Diupdate</dt>
                        <dd class="col-sm-9">{{ $hobi->updated_at?->format('d-m-Y H:i') }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
