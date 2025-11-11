@extends('backend.dashboard.index')

@section('title', 'Data Barang')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">Data Barang</h4>
        <a href="{{route('brg_create')}}" class="btn btn-primary btn-sm">Tambah Barang</a>
    </div>

    {{-- Form Pencarian --}}
    <form action="{{ route('brg') }}" method="GET" class="mb-3 d-flex" role="search">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari barang..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-primary">Cari</button>
    </form>

    {{-- Pesan Sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($items as $row)
                    <tr>
                        <td>{{ $row->kode }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->kategori }}</td>
                        <td>{{ $row->stok }}</td>
                        <td>{{ $row->harga }}</td>
                        <td>
                            <a href="{{ route('brg_edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('brg_delete', $row->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data barang</td>
                    </tr>
                @endforelse
            </tbody>
            </table>
        </div>
    </div>
@endsection
