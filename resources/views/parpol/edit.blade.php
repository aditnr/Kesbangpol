@extends('layouts.app')

@section('title', 'Edit Parpol')

@section('content')
<div class="container">
    <a href="{{ route('parpols.index') }}" class="btn btn-primary mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('parpols.update', $parpol->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="partai">Nama Partai</label>
                            <input type="text" class="form-control" name="partai" placeholder="partai" value="{{ old('partai', $parpol->partai) }}">
                            @error('partai')
                            <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="ketua">Ketua</label>
                            <input type="text" class="form-control" name="ketua" placeholder="ketua" value="{{ old('ketua', $parpol->ketua) }}">
                            @error('ketua')
                            <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="alamat">alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="alamat" value="{{ old('alamat', $parpol->alamat) }}">
                    @error('alamat')
                    <small style="color: red;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="imagePreview">Pratayang logo</label>
                        <img id="currentImage" src="{{ asset('storage/' . $parpol->logo) }}" alt="logo Parpol" class="img-fluid mb-3" style="max-width: 100%; height: auto;">
                    </div>

                    <div class="col-md-6">
                        <label for="logo">Logo</label>
                        <input type="file" class="form-control mb-3" name="logo" id="logo" onchange="previewNewImage()" accept="image/*">
                        @error('logo')
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
        const fileInput = document.getElementById('logo');
        const previewImage = document.getElementById('currentImage');
        const file = fileInput.files[0];

        if (file) {
            const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

            if (!allowedTypes.includes(file.type)) {
                alert('Tolong unggah file gambar yang valid (jpg, png, gif).');
                fileInput.value = ''; // Kosongkan input jika file tidak valid
                return;
            }

            const reader = new FileReader();

            reader.onload = function(e) {
                previewImage.src = e.target.result; // Ubah sumber logo ke hasil pembacaan file
            };

            reader.readAsDataURL(file); // Baca file sebagai URL Data
        }
    }
</script>
@endsection