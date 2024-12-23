@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
<div class="container mt-3">
    <a href="/dashboard" class="btn btn-primary mb-3">Kembali</a>
    @if(isset($kontak))
    @if (session('success'))
    <div class="alert alert-dark bg-success alert-dismissible fade show" role="alert">
        <small style="color: white;">{{ 'Data berhasil diubah' }}</small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('kontak.update', $kontak->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <!-- Form Input -->
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{ old('nama', $kontak->nama) }}">
                            @error('nama')
                            <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="{{ old('alamat', $kontak->alamat) }}">
                            @error('alamat')
                            <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="telepon">Telepon</label>
                            <input type="text" class="form-control" name="telepon" placeholder="Telepon" value="{{ old('telepon', $kontak->telepon) }}">
                            @error('telepon')
                            <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email', $kontak->email) }}">
                            @error('email')
                            <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="hari_jam_buka">Hari dan Jam Buka</label>
                            <input type="text" class="form-control" name="hari_jam_buka" placeholder="Contoh: Senin-Jumat 08:00 - 17:00" value="{{ old('hari_jam_buka', $kontak->hari_jam_buka) }}">
                            @error('hari_jam_buka')
                            <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="instagram">Instagram</label>
                            <input type="url" class="form-control" name="instagram" placeholder="Link Instagram" value="{{ old('instagram', $kontak->instagram) }}">
                            @error('instagram')
                            <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="youtube">YouTube</label>
                            <input type="url" class="form-control" name="youtube" placeholder="Link YouTube" value="{{ old('youtube', $kontak->youtube) }}">
                            @error('youtube')
                            <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="maps_url">Google Maps URL</label>
                            <input type="text" class="form-control" name="maps_url" id="maps_url" placeholder="Masukkan link Google Maps" value="{{ old('maps_url', $kontak->maps_url) }}">
                            @error('maps_url')
                            <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="row mt-3 mb-3">
                            <div class="col-md-12">
                                <label>Lokasi</label>
                                <iframe id="gmap_canvas"
                                    width="100%"
                                    height="400px"
                                    style="border:0;"
                                    allowfullscreen
                                    loading="lazy"
                                    src="{{ $kontak->maps_url }}">
                                </iframe>
                            </div>
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
<script>
    document.getElementById('maps_url').addEventListener('input', updateMap);

    function updateMap() {
        const url = document.getElementById('maps_url').value;
        const iframe = document.getElementById('gmap_canvas');
        iframe.src = url;
    }
</script>
@endsection