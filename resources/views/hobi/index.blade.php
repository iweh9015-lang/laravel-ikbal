@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="hero-title h3 mb-1">Manajemen Hobi</h1>
            <p class="text-secondary mb-0">Kelola daftar hobi dengan tampilan modern.</p>
        </div>
        <a href="{{ route('hobi.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-lg me-1"></i> Tambah Hobi
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row g-2 align-items-center mb-3">
                <div class="col-lg-6">
                    <form method="GET" action="{{ route('hobi.index') }}" class="d-flex gap-2">
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                            <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Cari nama hobi...">
                        </div>
                        <button class="btn btn-outline-secondary">Cari</button>
                        @if(request('q'))
                            <a href="{{ route('hobi.index') }}" class="btn btn-outline-dark">Reset</a>
                        @endif
                    </form>
                </div>
            </div>

            <div class="table-responsive table-sticky">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width:70px">No</th>
                            <th>Nama Hobi</th>
                            <th style="width:220px">Dibuat</th>
                            <th style="width:200px" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($hobis as $hobi)
                            <tr>
                                <td>
                                    <span class="badge text-bg-primary-subtle border border-primary-subtle">{{ $loop->iteration + ($hobis->currentPage()-1)*$hobis->perPage() }}</span>
                                </td>
                                <td class="fw-semibold">
                                    <i class="bi bi-heart text-danger me-1"></i>
                                    {{ $hobi->nama_hobi }}
                                </td>
                                <td>
                                    <span class="text-secondary"><i class="bi bi-calendar2-week me-1"></i>{{ $hobi->created_at?->format('d M Y, H:i') }}</span>
                                </td>
                                <td class="text-end">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('hobi.show', $hobi->id) }}" class="btn btn-sm btn-soft" title="Detail">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('hobi.edit', $hobi->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $hobi->id }}" title="Hapus">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </div>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal{{ $hobi->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Yakin ingin menghapus hobi "<strong>{{ $hobi->nama_hobi }}</strong>"?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('hobi.destroy', $hobi->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <div class="text-secondary">Belum ada data. Mulai dengan menambah hobi.</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white">
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-secondary">Total: {{ $hobis->total() }} data</small>
                {{ $hobis->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
