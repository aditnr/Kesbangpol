@extends('layouts.app')

@section('title', 'Detail Permohonan Informasi')

@section('content')
<div class="container mt-3">
    <div class="card-body">
        <table class="table table-bordered mb-3">
            <tr>
                <th>Nama</th>
                <td>{{ $permohonan_informasi->nama }}</td>
            </tr>
            <tr>
                <th>NIK</th>
                <td>{{ $permohonan_informasi->nik }}</td>
            </tr>
            <tr>
                <th>NIM</th>
                <td>{{ $permohonan_informasi->nim }}</td>
            </tr>
            <tr>
                <th>Perguruan Tinggi</th>
                <td>{{ $permohonan_informasi->perguruan_tinggi }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $permohonan_informasi->alamat }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $permohonan_informasi->email }}</td>
            </tr>
            <tr>
                <th>No HP</th>
                <td>{{ $permohonan_informasi->no_hp }}</td>
            </tr>
            <tr>
                <th>Informasi yang Dibutuhkan</th>
                <td>{{ $permohonan_informasi->informasi }}</td>
            </tr>
            <tr>
                <th>KTP</th>
                <td>
                    @if (pathinfo(Storage::url($permohonan_informasi->ktp), PATHINFO_EXTENSION) === 'pdf')
                    <embed src="{{ Storage::url($permohonan_informasi->ktp) }}" type="application/pdf" width="100" height="500px" />
                    @else
                    <img src="{{ Storage::url($permohonan_informasi->ktp) }}" class="img-fluid" alt="KTP {{ $permohonan_informasi->nama }}">
                    @endif
                </td>
            </tr>
        </table>
        <a href="{{ route('permohonan_informasi.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection