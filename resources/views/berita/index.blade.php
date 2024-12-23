@extends('layouts.app')

@section('title', 'Berita')

@section('content')
<div class="container mt-3">
    @if ($message = Session::get('message'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <a href="{{ route('beritas.create') }}" class="btn btn-primary mb-3">Tambah berita</a>

    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Diublikasikan</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php $i = 1; @endphp
                @foreach($beritas as $berita)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>
                        <a href="{{ route('berita.show', $berita->id) }}">{{ Str::limit($berita->judul, 50) }}</a>
                    </td>
                    <td>{{ $berita->created_at->format('d M Y') }}</td>
                    <td>
                        @if($berita->gambar)
                        <a href="#" data-bs-toggle="modal" data-bs-target="#beritaModal" data-bs-slide-to="{{ $loop->index }}">
                            <img src="{{ asset($berita->gambar) }}" alt="Gambar Berita" class="img-fluid table-image">
                        </a>
                        @else
                        <span>Belum ada gambar</span>
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('beritas.edit', $berita->id) }}"><i class="bx bx-edit-alt"></i> Edit</a>
                                <form action="{{ route('beritas.destroy', $berita->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                        <i class="bx bx-trash"></i> Hapus
                                    </button>
                                </form>
                                <a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#interaksi-{{ $berita->id }}"><i class="bx bx-bulb"></i> Interaksi</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr id="interaksi-{{ $berita->id }}" class="collapse">
                    <td colspan="6">
                        <div class="p-3">
                            <p>
                                <button class="btn btn-link p-0">
                                    <i class="fa-regular fa-thumbs-up" style="color: #1877f2; margin-right: 5px;"></i> {{ $berita->likes }}
                                </button>
                                <button class="btn btn-link p-0">
                                    <i class="fa-regular fa-thumbs-down" style="color: #ff0000; margin-right: 5px; margin-left: 30px;"></i> {{ $berita->dislikes }}
                                </button>
                                <button class="btn btn-link p-0" data-bs-toggle="collapse" data-bs-target="#komentar-{{ $berita->id }}">
                                    <i class="fa-regular fa-comment" style="color: #25d366; margin-right: 5px; margin-left: 30px;"></i> {{ $berita->comments_count }} komentar
                                </button>
                            </p>
                            <div id="komentar-{{ $berita->id }}" class="collapse">
                                @if($berita->comments->isNotEmpty())
                                <ul>
                                    @foreach($berita->comments as $comment)
                                    <li class="d-flex justify-content-between align-items-center comment-item">
                                        <div>
                                            <strong>{{ $comment->user_id == 0 ? 'Anonim' : $comment->user->name }}:</strong>
                                            {{ $comment->content }}
                                        </div>
                                        <div>
                                            <small class="text-muted">({{ $comment->created_at->format('d M Y H:i') }})</small>
                                            <form action="{{ route('beritas.destroyComment', [$berita->id, $comment->id]) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn p-0" onclick="return confirm('Apakah Anda yakin ingin menghapus komentar ini?')">
                                                    <i class="bx bx-trash text-danger"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </li>
                                    <hr>
                                    @endforeach
                                </ul>
                                @else
                                <p>Tidak ada komentar.</p>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="beritaModal" tabindex="-1" aria-labelledby="beritaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div id="gambarCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
                    <div class="carousel-inner">
                        @foreach($beritas as $index => $berita)
                        @if($berita->gambar)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <img src="{{ asset($berita->gambar) }}" class="d-block w-100 rounded" alt="Gambar Berita">
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
                @foreach($beritas as $index => $berita)
                @if($berita->gambar)
                <div class="text-center d-none {{ $index === 0 ? 'd-block' : '' }}" id="caption-{{ $berita->id }}">
                    <h5>{{ $berita->judul }}</h5>
                    <p>{{ $berita->created_at->format('d M Y') }}</p>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<style>
    .table-image {
        width: 70px;
        height: 50px;
        object-fit: cover;
    }

    .comment-item {
        margin-bottom: 10px;
    }

    .collapse .comment-item+hr {
        margin-top: 10px;
        margin-bottom: 10px;
        border-top: 1px solid #ccc;
    }

    .modal img {
        max-width: 100%;
        height: auto;
    }

    .carousel-caption {
        position: static;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var dropdownTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="dropdown"]'));
        var dropdownList = dropdownTriggerList.map(function(dropdownTriggerEl) {
            return new bootstrap.Dropdown(dropdownTriggerEl);
        });
    });

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
@endsection