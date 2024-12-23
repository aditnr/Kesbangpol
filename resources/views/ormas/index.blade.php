@extends('layouts.app')

@section('title', 'Ormas')

@section('content')
<div class="container mt-3">
    <a href="{{ route('ormass.create') }}" class="btn btn-primary mb-3">Tambah Organisasi</a>
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
                    <th>Nama Organisasi</th>
                    <th>Alamat</th>
                    <th>Tahun Berdiri</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php $i = 1; @endphp
                @foreach($ormass as $ormas)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $ormas->nama }}</td>
                    <td>{{ $ormas->alamat }}</td>
                    <td>{{ $ormas->tahun }}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('ormass.edit', $ormas->id) }}"><i class="bx bx-edit-alt"></i> Edit</a>
                                <form action="{{ route('ormass.destroy', $ormas->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item" onclick="return confirm('Apakah Anda yakin ingin menghapus organisasi ini?')">
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
@endsection