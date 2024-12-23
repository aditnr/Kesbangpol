@extends('layouts.template')
@section('title', 'Berita Terbaru')
@section('content')
<section id="berita" class="contact section">
    <div class="container section-title mt-5" data-aos="fade-up">
        <p>Berita terbaru</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @if ($beritas->isEmpty())
                <p>Tidak ada berita yang tersedia.</p>
                @else
                <section id="blog-posts" class="blog-posts section">
                    <div class="container">
                        <div class="row gy-4">
                            @foreach($beritas as $berita)
                            <div class="col-12">
                                <article>
                                    <div class="post-img">
                                        @if($berita->gambar)
                                        <img src="{{ asset($berita->gambar) }}" alt="Gambar Berita" class="img-fluid">
                                        @endif
                                    </div>
                                    <div class="meta-top">
                                        <ul>
                                            <li class="d-flex align-items-center">
                                                <i class="bi bi-person"></i>
                                                <a href="#">{{ $berita->penulis ?? 'Admin' }}</a>
                                            </li>
                                            <li class="d-flex align-items-center">
                                                <i class="bi bi-clock"></i>
                                                <a href="#">
                                                    <time datetime="{{ $berita->created_at }}">{{ $berita->created_at->format('d M Y') }}</time>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h2 class="title">{{ $berita->judul }}</h2>
                                    <div class="content">
                                        <p>{{ Str::limit(strip_tags($berita->konten), 150, '...') }}</p>
                                        <div class="read-more">
                                            <a href="{{ route('berita.show', $berita->id) }}">Read More</a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-lg-4 sidebar">
                <div class="widgets-container">
                    <div class="recent-posts-widget widget-item">
                        <h3 class="widget-title">Berita Lainnya</h3>
                        @foreach($recentBeritas as $recentBerita)
                        <div class="post-item">
                            <img src="{{ asset($recentBerita->gambar) }}" alt="Gambar Berita" class="flex-shrink-0 recent-post-img">
                            <div>
                                <h4><a href="{{ route('berita.show', $recentBerita->id) }}">{{ $recentBerita->judul }}</a></h4>
                                <time datetime="{{ $recentBerita->created_at }}">{{ $recentBerita->created_at->format('d M Y') }}</time>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</section>
@endsection