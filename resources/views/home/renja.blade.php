@extends('layouts.template')

@section('title', 'Rencana Kerja')

@section('content')
<section id="renja" class="contact section">
<div class="container section-title mt-5" data-aos="fade-up">
    <p>Rencana Kerja</p>
</div>
<div class="container">
    <div class="row">
        @foreach($renjas as $renja)
            <div class="col-md-12 mb-4">
                @if (strtolower(pathinfo($renja->file, PATHINFO_EXTENSION)) === 'pdf')
                    <div class="pdf-frame-container">
                        <div class="pdf-frame-header">{{ $renja->nama }}</div>
                        <iframe src="{{ asset($renja->file) }}" class="pdf-frame"></iframe>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
</section>
@endsection
