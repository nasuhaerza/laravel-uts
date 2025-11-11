@extends('backend.dashboard.index')

@section('title', 'Input Data Barang')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Tambah Barang</h2>

    <form action="{{ route('brg_store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="kode" class="form-label">Kode Barang</label>
            <input type="text" name="kode" id="kode" class="form-control" required>
            @error('kode')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" id="kategori" name="kategori" class="form-control" value="{{ old('kategori') }}" required>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" id="stok" name="stok" class="form-control" min="0" value="{{ old('stok') }}" required>
            @error('stok')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" id="harga" name="harga" class="form-control" min="0" step="0.01" value="{{ old('harga') }}" required>
            @error('harga')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('brg') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
