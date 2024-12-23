@extends('layouts.template')

@section('title', 'Daftar Informasi Publik')

@section('content')
<section id="daftar_informasi_publik" class="contact section">
<div class="container section-title mt-5" data-aos="fade-up">
    <p>Daftar Informasi Publik</p>
</div>
<div class="container">
    <div class="row">
        @foreach($daftar_informasi_publiks as $daftar_informasi_publik)
            <div class="col-md-12 mb-4">
                @if (strtolower(pathinfo($daftar_informasi_publik->file, PATHINFO_EXTENSION)) === 'pdf')
                    <div class="pdf-frame-container">
                        <div class="pdf-frame-header">{{ $daftar_informasi_publik->nama }}</div>
                        <iframe src="{{ asset($daftar_informasi_publik->file) }}" class="pdf-frame"></iframe>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
</section>
@endsection
