@extends('layouts.app')

@section('title', 'Tambah Parpol')

@section('content')
<div class="container">
    <a href="/parpols" class="btn btn-primary mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('parpols.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="partai">Nama Partai</label>
                            <input type="text" class="form-control" name="partai" placeholder="partai">
                            @error('partai')
                            <small style="color: red;">Nama partai harus diisi.</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="ketua">Ketua</label>
                            <input type="text" class="form-control" name="ketua" placeholder="ketua">
                            @error('ketua')
                            <small style="color: red;">Ketua harus diisi.</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="alamat">alamat</label>
                    <input class="form-control" name="Alamat" cols="30" rows="10" placeholder="alamat"></input>
                    @error('alamat')
                    <small style="color: red;">Alamat harus diisi.</small>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="logo">logo</label>
                            <input type="file" class="form-control" name="logo" id="logo" onchange="previewImage()">
                            @error('logo')
                            <small style="color: red;">logo harus diisi.</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="imagePreview">Pratayang logo</label>
                        <div id="imagePreviewContainer">
                            <img id="imagePreview" src="#" alt="Preview" style="display: none; max-width: 100%; height: auto;">
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    function previewImage() {
        const file = document.getElementById('logo').files[0];
        const preview = document.getElementById('imagePreview');
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }
</script>
@endsection