@extends('layouts.app')

@section('title', 'Edit Pegawai')

@section('content')
<div class="container">
    <a href="{{ route('pegawais.index') }}" class="btn btn-primary mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('pegawais.update', $pegawai->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <!-- Nama dan NIP sejajar -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{ old('nama', $pegawai->nama) }}">
                            @error('nama')
                            <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="nip">NIP</label>
                            <input type="number" class="form-control" name="nip" placeholder="NIP" value="{{ old('nip', $pegawai->nip) }}" min="0" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16);">
                            @error('nip')
                            <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Form Input Jabatan -->
                <div class="form-group mb-3">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" placeholder="Jabatan" value="{{ old('jabatan', $pegawai->jabatan) }}">
                    @error('jabatan')
                    <small style="color: red;">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Pratinjau Foto -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="imagePreview">Pratayang Foto</label>
                        <img id="currentImage" src="{{ asset('storage/' . $pegawai->foto) }}" alt="Foto Pegawai" class="img-fluid mb-3" style="max-width: 100%; height: auto;">
                    </div>

                    <div class="col-md-6">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control mb-3" name="foto" id="foto" onchange="previewNewImage()" accept="image/*">
                        @error('foto')
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
        const fileInput = document.getElementById('foto');
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
                previewImage.src = e.target.result; // Ubah sumber foto ke hasil pembacaan file
            };

            reader.readAsDataURL(file); // Baca file sebagai URL Data
        }
    }
</script>
@endsection