@extends('backend.dashboard.index')

@section('title', 'Edit Barang')

@section('content')
<div class="container">
    <h4 class="fw-bold mb-3">Edit Data Barang</h4>

    <form action="{{ route('brg_update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="kode" class="form-label">Kode Barang</label>
            <input type="text" name="kode" id="kode" value="{{ old('kode', $item->kode) }}" class="form-control" required>
            @error('kode')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
      
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $item->nama) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" name="kategori" id="kategori" value="{{ old('kategori', $item->kategori) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" name="stok" id="stok" value="{{ old('stok', $item->stok) }}" class="form-control" required>
            @error('stok')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" id="harga" value="{{ old('harga', $item->harga) }}" class="form-control" required>
            @error('harga')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('brg') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
