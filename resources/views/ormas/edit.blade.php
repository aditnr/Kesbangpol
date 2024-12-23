@extends('layouts.app')

@section('title', 'Edit Ormas')

@section('content')
<div class="container">
    <a href="{{ route('ormass.index') }}" class="btn btn-primary mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('ormass.update', $ormas->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <!-- Form Input -->
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="nama">Nama Ormas</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Ormas" value="{{ old('nama', $ormas->nama) }}">
                            @error('nama')
                            <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" cols="30" rows="10" placeholder="Alamat">{{ old('alamat', $ormas->alamat) }}</textarea>
                            @error('alamat')
                            <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="tahun">Tahun Berdiri</label>
                            <input type="number" class="form-control" name="tahun" placeholder="Tahun Berdiri" value="{{ old('tahun', $ormas->tahun) }}" min="1900" max="{{ date('Y') }}">
                            @error('tahun')
                            <small style="color: red;">{{ $message }}</small>
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
