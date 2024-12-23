@extends('layouts.app')

@section('title', 'Edit berita')

@section('content')
<div class="container">
    <a href="{{ route('beritas.index') }}" class="btn btn-primary mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('beritas.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" name="judul" placeholder="Judul" value="{{ old('judul', $berita->judul) }}">
                            @error('judul')
                            <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="konten">Konten</label>
                            <textarea class="form-control" name="konten" cols="30" rows="10" placeholder="Konten">{{ old('konten', $berita->konten) }}</textarea>
                            @error('konten')
                            <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="imagePreview">Pratayang Gambar</label>
                        <img id="currentImage" src="{{ asset($berita->gambar) }}" alt="Gambar Berita" class="img-fluid mb-3" style="max-width: 100%; height: auto;">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control mb-3" name="gambar" id="gambar" onchange="previewNewImage()">
                        @error('gambar')
                        <small style="color: red;">{{ $message }}</small>
                        @enderror
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function previewNewImage() {
        const fileInput = document.getElementById('gambar');
        const previewImage = document.getElementById('currentImage');

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImage.src = e.target.result;
            };

            reader.readAsDataURL(fileInput.files[0]);
        }
    }
</script>

<script src="https://cdn.ckeditor.com/4.22.0/standard/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        CKEDITOR.replace('konten');
    });
</script>
@endsection