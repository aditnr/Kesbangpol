@extends('layouts.app')

@section('title', 'Permohonan Informasi')

@section('content')
<div class="container mt-3">
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
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>NIM</th>
                    <th>Perguruan Tinggi</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Informasi yang Dibutuhkan</th>
                    <th>KTP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($permohonan_informasis as $permohonan_informasi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $permohonan_informasi->nama }}</td>
                    <td>{{ $permohonan_informasi->nik }}</td>
                    <td>{{ $permohonan_informasi->nim }}</td>
                    <td>{{ $permohonan_informasi->perguruan_tinggi }}</td>
                    <td>{{ $permohonan_informasi->alamat }}</td>
                    <td>{{ $permohonan_informasi->email }}</td>
                    <td>{{ $permohonan_informasi->no_hp }}</td>
                    <td>{{ $permohonan_informasi->informasi }}</td>
                    <td>
                        <button type="button" class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#modalKtp{{ $permohonan_informasi->id }}">
                            Lihat KTP
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalKtp{{ $permohonan_informasi->id }}" tabindex="-1" aria-labelledby="modalKtpLabel{{ $permohonan_informasi->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalKtpLabel{{ $permohonan_informasi->id }}">KTP {{ $permohonan_informasi->nama }}</h5>
                                    </div>
                                    <div class="modal-body">
                                        @if (pathinfo(Storage::url($permohonan_informasi->ktp), PATHINFO_EXTENSION) === 'pdf')
                                        <embed src="{{ Storage::url($permohonan_informasi->ktp) }}" type="application/pdf" width="100%" height="500px" />
                                        @else
                                        <img src="{{ Storage::url($permohonan_informasi->ktp) }}" class="img-fluid" alt="KTP {{ $permohonan_informasi->nama }}">
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('permohonan_informasi.show', $permohonan_informasi->id) }}"><i class="bx bx-show"></i> Lihat</a>
                                <form action="{{ route('permohonan_informasi.destroy', $permohonan_informasi->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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