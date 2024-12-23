@extends('layouts.app')

@section('title', 'Pengajuan Keberatan')

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
                    <th>Pengajuan</th>
                    <th>Dokumen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($pengajuan_keberatans as $pengajuan_keberatan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pengajuan_keberatan->nama }}</td>
                    <td>{{ $pengajuan_keberatan->nik }}</td>
                    <td>{{ $pengajuan_keberatan->nim }}</td>
                    <td>{{ $pengajuan_keberatan->perguruan_tinggi }}</td>
                    <td>{{ $pengajuan_keberatan->alamat }}</td>
                    <td>{{ $pengajuan_keberatan->email }}</td>
                    <td>{{ $pengajuan_keberatan->no_hp }}</td>
                    <td>{{ $pengajuan_keberatan->pengajuan }}</td>
                    <td>
                        <button type="button" class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#modalDokumen{{ $pengajuan_keberatan->id }}">
                            Lihat Dokumen
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalDokumen{{ $pengajuan_keberatan->id }}" tabindex="-1" aria-labelledby="modalDokumenLabel{{ $pengajuan_keberatan->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalDokumenLabel{{ $pengajuan_keberatan->id }}">Dokumen {{ $pengajuan_keberatan->nama }}</h5>
                                    </div>
                                    <div class="modal-body">
                                        @if (pathinfo(Storage::url($pengajuan_keberatan->dokumen), PATHINFO_EXTENSION) === 'pdf')
                                        <embed src="{{ Storage::url($pengajuan_keberatan->dokumen) }}" type="application/pdf" width="100%" height="500px" />
                                        @else
                                        <img src="{{ Storage::url($pengajuan_keberatan->dokumen) }}" class="img-fluid" alt="Dokumen {{ $pengajuan_keberatan->nama }}">
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
                                <a class="dropdown-item" href="{{ route('pengajuan_keberatan.show', $pengajuan_keberatan->id) }}"><i class="bx bx-show"></i> Lihat</a>
                                <form action="{{ route('pengajuan_keberatan.destroy', $pengajuan_keberatan->id) }}" method="POST">
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