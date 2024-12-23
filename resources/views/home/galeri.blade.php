@extends('layouts.template')

@section('title', 'Galeri')

@section('content')
  <section id="portfolio" class="portfolio section">
    <div class="container section-title mt-5" data-aos="fade-up">
      <p>Galeri Kesbangpol</p>
    </div>
    <div class="container">
      <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
        <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
          @foreach ($galeris as $item)
          <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
            <div class="portfolio-content h-100">
              @if($item->gambar)
              <a href="{{ asset($item->gambar) }}" title="{{ $item->konten }}" data-gallery="portfolio-gallery-app" class="glightbox">
                <img src="{{ ($item->gambar) }}" alt="Gambar galeri" class="img-fluid gallery-img">
                <div class="portfolio-info">
                  <p>{{ $item->judul }}</p>
                </div>
              </a>
              @else
              <span>Belum ada gambar</span>
              @endif
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
<style>
.gallery-img {
width: 100%;
height: 350px;
object-fit: cover;
}
</style>
@endsection
