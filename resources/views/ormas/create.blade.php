@extends('layouts.app')

@section('title', 'Tambah Ormas')

@section('content')
<div class="container">
    <a href="/ormass" class="btn btn-primary mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('ormass.store') }}" method="post">
                @csrf

                <div class="row mb-3">
                    <!-- Form Input -->
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="nama">Nama Ormas</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Ormas">
                            @error('nama')
                            <small style="color: red;">Nama Ormas harus diisi.</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" cols="30" rows="10" placeholder="Alamat"></textarea>
                            @error('alamat')
                            <small style="color: red;">Alamat harus diisi.</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="tahun">Tahun Berdiri</label>
                            <input type="number" class="form-control" name="tahun" placeholder="Tahun Berdiri" min="1900" max="{{ date('Y') }}">
                            @error('tahun')
                            <small style="color: red;">Tahun harus diisi.</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection
