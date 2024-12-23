@extends('layouts.template')
@section('title', 'Pegawai')
@section('content')
<section id="team" class="team section">
  <div class="container section-title mt-5" data-aos="fade-up">
    <p>Pegawai Kesbangpol</p>
  </div>
  <div class="container">
    <!-- Tambahkan d-flex pada row -->
    <div class="row gy-4 d-flex justify-content-center">
      @foreach ($pegawais as $item)
      <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
        <div class="team-member">
          <div class="member-img">
            @if($item->foto)
            <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto pegawai" class="img-fluid">
            @else
            <span>Belum ada foto</span>
            @endif
          </div>
          <div class="member-info">
            <h4>{{ $item->nama }}</h4>
            <p>{{ $item->jabatan }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

@endsection