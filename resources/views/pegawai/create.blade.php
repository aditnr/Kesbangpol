@extends('layouts.app')

@section('title', 'Tambah Pegawai')

@section('content')
<div class="container">
    <a href="/pegawais" class="btn btn-primary mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('pegawais.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama">
                            @error('nama')
                            <small style="color: red;">Nama harus diisi.</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="nip">NIP</label>
                            <input type="number" class="form-control" name="nip" placeholder="NIP" min="0" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 18);">
                            @error('nip')
                            <small style="color: red;">NIP harus diisi dengan angka.</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="jabatan">Jabatan</label>
                    <input class="form-control" name="jabatan" cols="30" rows="10" placeholder="Jabatan"></input>
                    @error('jabatan')
                    <small style="color: red;">Jabatan harus diisi.</small>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control" name="foto" id="foto" onchange="previewImage()">
                            @error('foto')
                            <small style="color: red;">Foto harus diisi.</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="imagePreview">Pratayang foto</label>
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
    const file = document.getElementById('foto').files[0];
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
