@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row mt-3">
        <style>
            .card-hover:hover {
                transform: scale(1.05);
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
        </style>

        <!-- Card Berita -->
        <div class="col-md-4 mb-4">
            <a href="{{ route('beritas.index') }}" class="text-decoration-none">
                <div class="card h-100 rounded-lg shadow-sm card-hover">
                    <div class="card-body bg-primary text-center rounded">
                        <h5 class="card-title mb-3 text-white"><strong>Berita</strong></h5>
                        <i class="bi bi-newspaper display-4 mb-3 text-white"> <strong>{{ $jumlahBerita ?? '0' }}</strong></i>
                        <span class="stretched-link"></span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card Galeri -->
        <div class="col-md-4 mb-4">
            <a href="{{ route('galeris.index') }}" class="text-decoration-none">
                <div class="card h-100 rounded-lg shadow-sm card-hover">
                    <div class="card-body bg-success text-center rounded">
                        <h5 class="card-title mb-3 text-white"><strong>Galeri</strong></h5>
                        <i class="bi bi-images display-4 mb-3 text-white"> <strong>{{ $jumlahGaleri ?? '0' }}</strong></i>
                        <span class="stretched-link"></span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card Pegawai -->
        <div class="col-md-4 mb-4">
            <a href="{{ route('pegawais.index') }}" class="text-decoration-none">
                <div class="card h-100 rounded-lg shadow-sm card-hover">
                    <div class="card-body bg-warning text-center rounded">
                        <h5 class="card-title mb-3 text-white"><strong>Pegawai</strong></h5>
                        <i class="bi bi-people-fill display-4 mb-3 text-white"> <strong>{{ $jumlahPegawai ?? '0' }}</strong></i>
                        <span class="stretched-link"></span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card Permohonan Informasi -->
        <div class="col-md-6 mb-4">
            <a href="{{ route('permohonan_informasi.index') }}" class="text-decoration-none">
                <div class="card h-100 rounded-lg shadow-sm card-hover">
                    <div class="card-body bg-danger text-center rounded">
                        <h5 class="card-title mb-3 text-white"><strong>Permohonan Informasi</strong></h5>
                        <i class="bi bi-people-fill display-4 mb-3 text-white"> <strong>{{ $jumlahPermohonanInformasi ?? '0' }}</strong></i>
                        <span class="stretched-link"></span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card Pengajuan Keberatan -->
        <div class="col-md-6 mb-4">
            <a href="{{ route('pengajuan_keberatan.index') }}" class="text-decoration-none">
                <div class="card h-100 rounded-lg shadow-sm card-hover">
                    <div class="card-body bg-danger text-center rounded">
                        <h5 class="card-title mb-3 text-white"><strong>Pengajuan Keberatan</strong></h5>
                        <i class="bi bi-people-fill display-4 mb-3 text-white"> <strong>{{ $jumlahPengajuanKeberatan ?? '0' }}</strong></i>
                        <span class="stretched-link"></span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card Tentang -->
        @if($tentang)
        <div class="col-md-12 mb-4">
            <div class="card h-100 rounded-lg shadow-sm">
                <div class="card-body bg-light rounded">
                    <h4 class="card-title mb-3"><strong>{{ $tentang->judul ?? 'Judul tidak tersedia' }}</strong></h4>
                    <p class="card-text text-dark">{!! nl2br(preg_replace('/\n\s*\n/', "\n", trim($tentang->deskripsi ?? 'Deskripsi tidak tersedia'))) !!}</p>
                    <a href="{{ route('tentang.index', $tentang->id ?? '#') }}" class="btn btn-link text-primary fw-medium p-0">Edit</a>
                </div>
            </div>
        </div>
        @endif

        <!-- Card Struktur Organisasi -->
        @if($struktur)
        <div class="col-md-12 mb-4">
            <div class="card h-100 rounded-lg shadow-sm">
                <div class="card-body bg-light rounded">
                    <h4 class="card-title mb-3"><strong>Struktur Organisasi</strong></h4>
                    <div class="mb-3 text-center">
                        @if($struktur->image_path)
                        <img src="{{ asset( 'storage/'.$struktur->image_path) }}" alt="Gambar Struktur" style="max-width: 100%; height: auto;">
                        @else
                        <p>Tidak ada gambar struktur.</p>
                        @endif
                    </div>
                    <a href="{{ route('struktur.index', $struktur->id ?? '#') }}" class="btn btn-link text-primary fw-medium p-0">Edit</a>
                </div>
            </div>
        </div>
        @endif

        <!-- Card Tugas -->
        @if($tugas)
        <div class="col-md-12 mb-4">
            <div class="card h-100 rounded-lg shadow-sm">
                <div class="card-body bg-light rounded">
                    <h4 class="card-title mb-3"><strong>Tugas</strong></h4>
                    <p class="card-text">{!! nl2br(preg_replace('/\n\s*\n/', "\n", trim($tugas->tugas ?? 'Tugas tidak tersedia'))) !!}</p>
                    <a href="{{ route('tugas.index') }}" class="btn btn-link text-primary fw-medium p-0">Edit</a>
                </div>
            </div>
        </div>
        @endif

        <!-- Card Fungsi -->
        @if($tugas)
        <div class="col-md-12 mb-4">
            <div class="card h-100 rounded-lg shadow-sm">
                <div class="card-body bg-light rounded">
                    <h4 class="card-title mb-3"><strong>Fungsi</strong></h4>
                    <p class="card-text">{!! nl2br(preg_replace('/\n\s*\n/', "\n", trim($tugas->fungsi ?? 'Fungsi tidak tersedia'))) !!}</p>
                    <a href="{{ route('tugas.index') }}" class="btn btn-link text-primary fw-medium p-0">Edit</a>
                </div>
            </div>
        </div>
        @endif

        <!-- Card Visi dan Misi -->
        @if($visi)
        <div class="col-md-12 mb-4">
            <div class="card h-100 rounded-lg shadow-sm">
                <div class="card-body bg-light rounded">
                    <h4 class="card-title mb-3"><strong>Visi</strong></h4>
                    <p class="card-text">{!! nl2br(preg_replace('/\n\s*\n/', "\n", trim($visi->visi ?? 'Visi tidak tersedia'))) !!}</p>
                    <a href="{{ route('visi.index') }}" class="btn btn-link text-primary fw-medium p-0">Edit</a>
                </div>
            </div>
        </div>

        <div class="col-md-12 mb-4">
            <div class="card h-100 rounded-lg shadow-sm">
                <div class="card-body bg-light rounded">
                    <h4 class="card-title mb-3"><strong>Misi</strong></h4>
                    <p class="card-text">{!! nl2br(preg_replace('/\n\s*\n/', "\n", trim($visi->misi ?? 'Misi tidak tersedia'))) !!}</p>
                    <a href="{{ route('visi.index') }}" class="btn btn-link text-primary fw-medium p-0">Edit</a>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>
@endsection