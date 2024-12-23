@extends('layouts.template')

@section('title', 'Laporan Kinerja Instansi Pemerintah')

@section('content')
<section id="lkip" class="contact section">
<div class="container section-title mt-5" data-aos="fade-up">
    <p>Laporan Kinerja Instansi Pemerintah</p>
</div>
<div class="container">
    <div class="row">
        @foreach($lkips as $lkip)
            <div class="col-md-12 mb-4">
                @if (strtolower(pathinfo($lkip->file, PATHINFO_EXTENSION)) === 'pdf')
                    <div class="pdf-frame-container">
                        <div class="pdf-frame-header">{{ $lkip->nama }}</div>
                        <iframe src="{{ asset($lkip->file) }}" class="pdf-frame"></iframe>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
</section>
@endsection
