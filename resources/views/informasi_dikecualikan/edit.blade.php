@extends('layouts.app')

@section('title', 'Edit Informasi')

@section('content')
<div class="container">
    <a href="/informasi_dikecualikans" class="btn btn-primary mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <!-- Form untuk update data -->
            <form action="{{ route('informasi_dikecualikans.update', $informasi_dikecualikan->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="nama">Nama File</label>
                            <input type="text" class="form-control" name="nama" value="{{ old('nama', $informasi_dikecualikan->nama) }}" placeholder="Nama File">
                            @error('nama')
                            <small style="color: red;">Nama File harus diisi.</small>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="file">File</label>
                            <input type="file" class="form-control" name="file" accept=".pdf,.doc,.docx">
                            @if($informasi_dikecualikan->file)
                            <div class="mt-2">
                                <small>File yang saat ini diunggah:</small>
                                <a href="{{ asset('storage/' . $informasi_dikecualikan->file) }}" target="_blank">{{ $informasi_dikecualikan->nama }}</a>
                            </div>
                            @endif
                            @error('file')
                            <small style="color: red;">File harus diisi.</small>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="tahun">Tahun</label>
                            <input type="number" class="form-control" name="tahun" value="{{ old('tahun', $informasi_dikecualikan->tahun) }}" placeholder="Tahun" min="1900" max="{{ date('Y') }}">
                            @error('tahun')
                            <small style="color: red;">Tahun harus diisi dan valid.</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
