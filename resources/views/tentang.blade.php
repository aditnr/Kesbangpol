@extends('layouts.app')

@section('title', 'Tentang')

@section('content')
<div class="container">
    <a href="/dashboard" class="btn btn-primary mb-3">Kembali</a>
    @if(isset($tentang))
    @if (session('success'))
    <div class="alert alert-dark bg-success alert-dismissible fade show" role="alert">
        <small style="color: white;">{{ 'Data berhasil diubah' }}</small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('tentang.update', $tentang->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" name="judul" placeholder="Judul" value="{{ old('judul', $tentang->judul) }}">
                            @error('judul')
                            <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10" placeholder="Deskripsi">{{ old('deskripsi', $tentang->deskripsi) }}</textarea>
                            @error('deskripsi')
                            <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @else
    <div class="alert alert-warning">
        Data tidak ditemukan. Silakan tambahkan terlebih dahulu.
    </div>
    @endif
</div>
<script src="https://cdn.ckeditor.com/4.22.0/standard/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        CKEDITOR.replace('deskripsi');
    });
</script>
@endsection