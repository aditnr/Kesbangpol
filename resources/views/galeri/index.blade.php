@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
<div class="container mt-3">
    <a href="{{ route('galeris.create') }}" class="btn btn-primary mb-3">Tambah Galeri</a>
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
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php $i = 1; @endphp
                @foreach($galeris as $galeri)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>
                        @if($galeri->gambar)
                        <a href="#" data-bs-toggle="modal" data-bs-target="#galeriModal" data-bs-slide-to="{{ $loop->index }}">
                            <img src="{{ asset($galeri->gambar) }}" alt="Gambar Galeri" class="img-fluid table-image">
                        </a>
                        @else
                        <span>Belum ada gambar</span>
                        @endif
                    </td>
                    <td>{{ $galeri->judul }}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('galeris.edit', $galeri->id) }}"><i class="bx bx-edit-alt"></i> Edit</a>
                                <form action="{{ route('galeris.destroy', $galeri->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item" onclick="return confirm('Apakah Anda yakin ingin menghapus galeri ini?')">
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
<div class="modal fade" id="galeriModal" tabindex="-1" aria-labelledby="galeriModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div id="gambarCarousel" class="carousel slide" data-bs-interval="false">
                    <div class="carousel-inner">
                        @foreach($galeris as $index => $galeri)
                        @if($galeri->gambar)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <img src="{{ asset($galeri->gambar) }}" class="d-block w-100 rounded" alt="Gambar Galeri">
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#gambarCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#gambarCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="modal-footer flex-column">
                @foreach($galeris as $index => $galeri)
                @if($galeri->gambar)
                <div class="text-center d-none {{ $index === 0 ? 'd-block' : '' }}" id="caption-{{ $galeri->id }}">
                    <h5>{{ $galeri->judul }}</h5>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const carouselElement = document.querySelector('#gambarCarousel');
        carouselElement.removeAttribute('data-bs-ride');

        const carousel = new bootstrap.Carousel(carouselElement, {
            interval: false,
            ride: false,
            wrap: true
        });

        document.querySelectorAll('[data-bs-slide-to]').forEach((element) => {
            element.addEventListener('click', function() {
                const index = this.getAttribute('data-bs-slide-to');
                carousel.to(index);
            });
        });

        if (carouselElement) {
            carouselElement.addEventListener('slide.bs.carousel', function(event) {
                document.querySelectorAll('.modal-footer .text-center').forEach((caption, index) => {
                    caption.classList.toggle('d-block', index === event.to);
                    caption.classList.toggle('d-none', index !== event.to);
                });
            });
        }
    });
</script>

<style>
    .table-image {
        width: 70px;
        height: 50px;
        object-fit: cover;
    }

    .modal img {
        max-width: 100%;
        height: auto;
    }

    .carousel-caption {
        position: static;
    }
</style>
@endsection