@extends('layouts.template')

@section('title', 'Informasi Dikecualikan')

@section('content')
<section id="informasi_dikecualikan" class="contact section">
    <div class="container section-title mt-5" data-aos="fade-up">
        <p>Informasi Dikecualikan</p>
    </div>
    <div class="container">
        <div class="row">
            @foreach($informasi_dikecualikans as $informasi_dikecualikan)
                <div class="col-md-12 mb-4">
                    @if (strtolower(pathinfo($informasi_dikecualikan->file, PATHINFO_EXTENSION)) === 'pdf')
                        <div class="pdf-frame-container">
                            <div class="pdf-frame-header">{{ $informasi_dikecualikan->nama }}</div>
                            <iframe src="{{ asset($informasi_dikecualikan->file) }}" class="pdf-frame"></iframe>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
