@extends('layouts.app')

@section('title', 'Daftar Informasi Publik')

@section('content')
<div class="container mt-3">
    <a href="{{ route('daftar_informasi_publiks.create') }}" class="btn btn-primary mb-3">Tambah File</a>
    @if ($message = Session::get('message'))
    <div class="alert alert-dark bg-success alert-dismissible fade show" role="alert">
        <small style="color: white;">{{ $message }}</small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama File</th>
                    <th>File</th>
                    <th>Tahun</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php $i = 1; @endphp
                @foreach($daftar_informasi_publiks as $daftar_informasi_publik)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $daftar_informasi_publik->nama }}</td>
                    <td>
                        <a href="{{ asset($daftar_informasi_publik->file) }}" target="_blank">
                            {{ basename($daftar_informasi_publik->file) }}
                        </a>
                    </td>
                    <td>{{ $daftar_informasi_publik->tahun }}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('daftar_informasi_publiks.edit', $daftar_informasi_publik->id) }}"><i class="bx bx-edit-alt"></i> Edit</a>
                                <form action="{{ route('daftar_informasi_publiks.destroy', $daftar_informasi_publik->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item" onclick="return confirm('Apakah Anda yakin ingin menghapus daftar_informasi_publik ini?')">
                                        <i class="bx bx-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    .table-image {
        width: 70px;
        height: 70px;
        object-fit: cover;
    }
</style>
@endsection