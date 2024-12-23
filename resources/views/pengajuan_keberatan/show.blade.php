@extends('layouts.app')

@section('title', 'Detail Permohonan Informasi')

@section('content')
<div class="container mt-3">
    <div class="card-body">
        <table class="table table-bordered mb-3">
            <tr>
                <th>Nama</th>
                <td>{{ $pengajuan_keberatan->nama }}</td>
            </tr>
            <tr>
                <th>NIK</th>
                <td>{{ $pengajuan_keberatan->nik }}</td>
            </tr>
            <tr>
                <th>NIM</th>
                <td>{{ $pengajuan_keberatan->nim }}</td>
            </tr>
            <tr>
                <th>Perguruan Tinggi</th>
                <td>{{ $pengajuan_keberatan->perguruan_tinggi }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $pengajuan_keberatan->alamat }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $pengajuan_keberatan->email }}</td>
            </tr>
            <tr>
                <th>No HP</th>
                <td>{{ $pengajuan_keberatan->no_hp }}</td>
            </tr>
            <tr>
                <th>Pengajuan</th>
                <td>{{ $pengajuan_keberatan->pengajuan }}</td>
            </tr>
            <tr>
                <th>Dokumen</th>
                <td>
                    @if (pathinfo(Storage::url($pengajuan_keberatan->dokumen), PATHINFO_EXTENSION) === 'pdf')
                    <embed src="{{ Storage::url($pengajuan_keberatan->dokumen) }}" type="application/pdf" class="embed-responsive-item" style="width: 100%; max-width: 600px; height: 400px;" />
                    @else
                    <img src="{{ Storage::url($pengajuan_keberatan->dokumen) }}" class="img-fluid" style="max-width: 600px;" alt="dokumen {{ $pengajuan_keberatan->nama }}">
                    @endif
                </td>

            </tr>
        </table>
        <a href="{{ route('pengajuan_keberatan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
</div>
@endsection