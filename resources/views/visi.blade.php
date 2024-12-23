@extends('layouts.app')

@section('title', 'Visi Misi')

@section('content')
<div class="container">
    <a href="/dashboard" class="btn btn-primary mb-3">Kembali</a>
    @if(isset($visi))
    @if (session('success'))
    <div class="alert alert-dark bg-success alert-dismissible fade show" role="alert">
        <small style="color: white;">{{ 'Data berhasil diubah' }}</small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('visi.update', $visi->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="visi">Visi</label>
                    <textarea class="form-control" name="visi">{{ old('visi', $visi->visi) }}</textarea>
                    @error('visi')
                    <small style="color: red;">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="misi">Misi</label>
                    <textarea class="form-control" name="misi">{{ old('misi', $visi->misi) }}</textarea>
                    @error('misi')
                    <small style="color: red;">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
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
        CKEDITOR.replace('visi');
        CKEDITOR.replace('misi');
    });
</script>
@endsection