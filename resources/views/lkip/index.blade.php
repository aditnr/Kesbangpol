@extends('layouts.app')

@section('title', 'Laporan Kinerja Instansi Pemerintah')

@section('content')
<div class="container mt-3">
    <a href="{{ route('lkips.create') }}" class="btn btn-primary mb-3">Tambah LKIP</a>
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
                    <th>Tahun</th> <!-- Kolom Tahun Ditambahkan -->
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php $i = 1; @endphp
                @foreach($lkips as $lkip)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $lkip->nama }}</td>
                    <td>
                        <!-- Tautan untuk mengunduh file -->
                        <a href="{{ asset($lkip->file) }}" target="_blank">
                            {{ basename($lkip->file) }} <!-- Menampilkan nama file asli -->
                        </a>
                    </td>

                    <td>{{ $lkip->tahun }}</td> <!-- Menampilkan tahun -->
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('lkips.edit', $lkip->id) }}"><i class="bx bx-edit-alt"></i> Edit</a>
                                <form action="{{ route('lkips.destroy', $lkip->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item" onclick="return confirm('Apakah Anda yakin ingin menghapus lkip ini?')">
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
        width: 70px; /* Atur lebar gambar */
        height: 70px; /* Atur tinggi gambar */
        object-fit: cover; /* Memastikan gambar tetap proporsional dan tidak terdistorsi */
    }
</style>
@endsection
