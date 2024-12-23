@extends('layouts.app')

@section('title', 'Indeks Kepuasan Masyarakat')

@section('content')
<div class="container mt-3">
    <a href="{{ route('ikms.create') }}" class="btn btn-primary mb-3">Tambah File</a>
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
                @foreach($ikms as $ikm)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $ikm->nama }}</td>
                    <td>
                        <a href="{{ asset($ikm->file) }}" target="_blank">
                            {{ basename($ikm->file) }}
                        </a>
                    </td>
                    <td>{{ $ikm->tahun }}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('ikms.edit', $ikm->id) }}"><i class="bx bx-edit-alt"></i> Edit</a>
                                <form action="{{ route('ikms.destroy', $ikm->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item" onclick="return confirm('Apakah Anda yakin ingin menghapus ikm ini?')">
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