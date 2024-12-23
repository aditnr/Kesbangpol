@extends('layouts.app')

@section('title', 'Struktur')

@section('content')
<div class="container">
    <a href="/dashboard" class="btn btn-primary mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            @if(isset($struktur))
            <form action="{{ route('struktur.update', $struktur->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="logo">Upload Gambar Struktur</label>
                            <input type="file" class="form-control" name="image_path" id="image_path" accept="image/*" onchange="previewNewImage()">
                            @error('image_path')
                            <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>
                        @if(!empty($struktur->image_path))
                        <div class="form-group mb-3">
                            <label>Gambar Saat Ini:</label><br>
                            <img src="{{ asset('storage/' . $struktur->image_path) }}" alt="Gambar Struktur" id="currentImage" style="width: 900px; height: auto;">
                        </div>
                        @else
                        <div class="form-group mb-3">
                            <img id="currentImage" src="#" alt="Gambar Pratinjau" style="display: none; width: 500px; height: auto;">
                        </div>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
            @else
            <div class="alert alert-warning">
                Data tidak ditemukan. Silakan tambahkan terlebih dahulu.
            </div>
            @endif
        </div>
    </div>
</div>
<script>
    function previewNewImage() {
        const fileInput = document.getElementById('image_path');
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
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection