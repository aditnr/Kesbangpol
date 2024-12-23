@extends('layouts.app')

@section('title', 'Tugas dan Fungsi')

@section('content')
<div class="container">
    <a href="/dashboard" class="btn btn-primary mb-3">Kembali</a>
    @if(isset($tugas))
    @if (session('success'))
    <div class="alert alert-dark bg-success alert-dismissible fade show" role="alert">
        <small style="color: white;">{{ 'Data berhasil diubah' }}</small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('tugas.update', $tugas->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="tugas">Tugas</label>
                    <textarea class="form-control ckeditor" name="tugas">{{ old('tugas', optional($tugas)->tugas) }}</textarea>
                    @error('tugas')
                    <small style="color: red;">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="fungsi">Fungsi</label>
                    <textarea class="form-control ckeditor" name="fungsi">{{ old('fungsi', optional($tugas)->fungsi) }}</textarea>
                    @error('fungsi')
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
        CKEDITOR.replace('tugas');
        CKEDITOR.replace('fungsi');
    });
</script>
@endsection