@extends('layouts.template')

@section('title', 'Indeks Kepuasan Masyarakat')

@section('content')
<section id="ikm" class="contact section">
<div class="container section-title mt-5" data-aos="fade-up">
    <p>Indeks Kepuasan Masyarakat</p>
</div>
<div class="container">
    <div class="row">
        @foreach($ikms as $ikm)
            <div class="col-md-12 mb-4">
                @if (strtolower(pathinfo($ikm->file, PATHINFO_EXTENSION)) === 'pdf')
                    <div class="pdf-frame-container">
                        <div class="pdf-frame-header">{{ $ikm->nama }}</div>
                        <iframe src="{{ asset($ikm->file) }}" class="pdf-frame"></iframe>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
</section>
@endsection
