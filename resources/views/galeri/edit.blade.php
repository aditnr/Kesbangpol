@extends('layouts.app')

@section('title', 'Edit Galeri')

@section('content')
<div class="container">
    <a href="{{ route('galeris.index') }}" class="btn btn-primary mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('galeris.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" name="judul" placeholder="judul" value="{{ old('judul', $galeri->judul) }}">
                    @error('judul')
                    <small style="color: red;">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="imagePreview">Pratayang gambar</label>
                        <img id="currentImage" src="{{ asset($galeri->gambar) }}" alt="Gambar Galeri" class="img-fluid mb-3" style="max-width: 100%; height: auto;">
                    </div>
                    <div class="col-md-6">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control mb-3" name="gambar" id="gambar" onchange="previewNewImage()" accept="image/*">
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
        const file = fileInput.files[0];
        if (file) {
            const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (!allowedTypes.includes(file.type)) {
                alert('Tolong unggah file gambar yang valid (jpg, png, gif).');
                fileInput.value = '';
                return;
            }
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result + '?t=' + new Date().getTime();
                previewImage.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection