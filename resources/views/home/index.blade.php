@extends('layouts.template')

@section('title', 'Kesbangpol Kota Tasikmalaya')

@section('content')
<section id="hero" class="hero section">
  <div class="container">
    <div class="col-lg-12 order-1 order-lg-2 hero-img" data-aos="zoom-out">
      <center><img src="assets/img/logo.png" style="width: 200px;" class="img-fluid animated" alt=""></center>
    </div>
    <div class="row gy-4 mt-4">
      <div class="col-lg-12 order-2 order-lg-1 d-flex flex-column justify-content-center">
        <center>
          <h1 data-aos="fade-up">KESBANGPOL</h1>
          <h1 data-aos="fade-up" data-aos-delay="100">Kota Tasikmalaya</h1>
        </center>
      </div>
    </div>
  </div>
</section>

<section id="recent-posts" class="recent-posts section">
  <div class="container section-title" data-aos="fade-up">
    <p>Berita Terbaru</p>
  </div>
  <div class="container">
    <div class="row gy-5">
      @foreach ($beritas as $berita)
      <div class="col-xl-4 col-md-6">
        <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">
          <div class="post-img position-relative overflow-hidden">
            <img src="{{ asset($berita->gambar) }}" class="img-fluid" alt="">
            <span class="post-date">{{ $berita->created_at->format('d M Y') }}</span>
          </div>
          <div class="post-content d-flex flex-column">
            <h3 class="post-title">{{ $berita->judul }}</h3>
            <div class="meta d-flex align-items-center">
              <div class="d-flex align-items-center">
                <i class="bi bi-person"></i> <span class="ps-2">{{ $berita->penulis ?? 'Admin' }}</span>
              </div>
              <span class="px-3 text-black-50">/</span>
              <div class="d-flex align-items-center">
                <i class="bi bi-clock"></i> <span class="ps-2">{{ $berita->created_at->format('d M Y') }}</span>
              </div>
            </div>
            <hr>
            <a href="{{ route('berita.show', $berita->id) }}" class="readmore stretched-link">
              <span>Read More</span><i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<section id="tentang" class="about section">
  <div class="container section-title" data-aos="fade-up">
    <p>Tentang Kesbangpol</p>
  </div>
  <div class="container" data-aos="fade-up">
    <div class="row gx-0">
      @foreach ($tentang as $item)
      <div class="col-lg-12 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
        <div class="content">
          <p>{!! nl2br(preg_replace('/\n\s*\n/', "\n", trim($item->deskripsi))) !!}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<section id="struktur" class="about section">
  <div class="container section-title" data-aos="fade-up">
    <p>Struktur Organisasi Kesbangpol</p>
  </div>
  <div class="container" data-aos="fade-up">
    <div class="row gx-0">
      @foreach ($struktur as $item)
      <div class="col-lg-12 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
        <img src="{{ asset( 'storage/'.$item->image_path) }}" class="img-fluid" alt="">
      </div>
      @endforeach
    </div>
  </div>
</section>
<section id="tugas" class="about section">
  <div class="container section-title" data-aos="fade-up">
    <p>Tugas dan Fungsi Kesbangpol</p>
  </div>
  <div class="container" data-aos="fade-up">
    <div class="row gx-0">
      @foreach ($tugas as $item)
      <div class="col-lg-12 d-flex flex-column justify-content-center mb-3" data-aos="fade-up" data-aos-delay="200">
        <div class="content">
          <h2>Tugas</h2>
          <p>{!! nl2br(preg_replace('/\n\s*\n/', "\n", trim($item->tugas))) !!}</p>
        </div>
      </div>
      <div class="col-lg-12 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
        <div class="content">
          <h2>Fungsi</h2>
          <p>{!! nl2br(preg_replace('/\n\s*\n/', "\n", trim($item->fungsi))) !!}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<section id="visi" class="about section">
  <div class="container section-title" data-aos="fade-up">
    <p>Visi dan Misi Kesbangpol</p>
  </div>
  <div class="container" data-aos="fade-up">
    <div class="row gx-0">
      @foreach ($visi as $item)
      <div class="col-lg-12 d-flex flex-column justify-content-center mb-3" data-aos="fade-up" data-aos-delay="200">
        <div class="content">
          <h2>Visi</h2>
          <p>{!! nl2br(preg_replace('/\n\s*\n/', "\n", trim($item->visi))) !!}</p>
        </div>
      </div>
      <div class="col-lg-12 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
        <div class="content">
          <h2>Misi</h2>
          <p>{!! nl2br(preg_replace('/\n\s*\n/', "\n", trim($item->misi))) !!}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection