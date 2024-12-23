@extends('layouts.app')

@section('title', 'Informasi Berkala')

@section('content')
<div class="container mt-3">
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>Nama File</th>
                    <th>File</th>
                    <th>Tahun</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($informasi_berkalas as $index => $informasi_berkala)
                <tr>
                    <td>{{ $informasi_berkala->nama }}</td>
                    <td>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#dokumenModal" data-bs-slide-to="{{ $index }}">
                            {{ basename($informasi_berkala->file) }}
                        </a>
                    </td>
                    <td>{{ $informasi_berkala->tahun }}</td>
                    <td>
                        <a href="{{ asset($informasi_berkala->file) }}" target="_blank" class="btn btn-sm btn-primary">
                            <i class="bx bx-download"></i> Unduh
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal untuk menampilkan dokumen -->
<div class="modal fade" id="dokumenModal" tabindex="-1" aria-labelledby="dokumenModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div id="dokumenCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
                    <div class="carousel-inner">
                        @foreach($informasi_berkalas as $index => $informasi_berkala)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <iframe src="{{ asset($informasi_berkala->file) }}" width="100%" height="500" frameborder="0"></iframe>
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#dokumenCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#dokumenCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="modal-footer flex-column">
                @foreach($informasi_berkalas as $index => $informasi_berkala)
                <div class="text-center d-none {{ $index === 0 ? 'd-block' : '' }}" id="caption-{{ $index }}">
                    <h5>{{ $informasi_berkala->nama }}</h5>
                    <p>Tahun {{ $informasi_berkala->tahun }}</p>
                    <a href="{{ asset($informasi_berkala->file) }}" target="_blank" class="btn btn-primary btn-sm">
                        <i class="bx bx-download"></i> Unduh Dokumen
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
    .modal img {
        max-width: 100%;
        height: auto;
    }
    .carousel-caption {
        position: static;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const carouselElement = document.querySelector('#dokumenCarousel');
    
    // Hapus atribut data-bs-ride untuk menghentikan slide otomatis
    carouselElement.removeAttribute('data-bs-ride');
    
    const carousel = new bootstrap.Carousel(carouselElement, {
        interval: false, // Pastikan interval dinonaktifkan
        ride: false, // Tambahkan opsi ini untuk memastikan tidak ada slide otomatis
        wrap: true
    });

    document.querySelectorAll('[data-bs-slide-to]').forEach((element) => {
        element.addEventListener('click', function () {
            const index = this.getAttribute('data-bs-slide-to');
            carousel.to(index);
        });
    });

    if (carouselElement) {
        carouselElement.addEventListener('slide.bs.carousel', function (event) {
            document.querySelectorAll('.modal-footer .text-center').forEach((caption, index) => {
                caption.classList.toggle('d-block', index === event.to);
                caption.classList.toggle('d-none', index !== event.to);
            });
        });
    }
});
</script>
@endsection