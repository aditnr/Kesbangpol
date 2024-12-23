@extends('layouts.template')

@section('title', 'Informasi Berkala')

@section('content')
<section id="informasi_berkala" class="contact section">
<div class="container section-title mt-5" data-aos="fade-up">
    <p>Informasi Berkala</p>
</div>
<div class="container">
    <div class="row">
        @foreach($informasi_berkalas as $informasi_berkala)
            <div class="col-md-12 mb-4">
                <div class="information-header">
                    <strong>Nama Informasi:</strong> {{ $informasi_berkala->nama }} <br>
                    <strong>Tahun:</strong> {{ $informasi_berkala->tahun }}
                </div>
                @if (strtolower(pathinfo($informasi_berkala->file, PATHINFO_EXTENSION)) === 'pdf')
                    <div class="pdf-frame-container mb-5">
                        <div class="pdf-frame-header">{{ $informasi_berkala->nama }}</div>
                        <iframe src="{{ asset($informasi_berkala->file) }}" class="pdf-frame"></iframe>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
</section>
@endsection
