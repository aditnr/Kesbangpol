{{-- show.blade.php --}}
@extends(Auth::check() ? 'layouts.admin' : 'layouts.template')

@section('title', $berita->judul)

@section('content')
<div class="container">
    @auth
    <div class="d-flex justify-content-between mb-3">
        <h1>{{ $berita->judul }}</h1>
        <div>
            <a href="{{ route('beritas.edit', $berita->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('beritas.destroy', $berita->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">Hapus</button>
            </form>
        </div>
    </div>
    @endauth
    @guest
    <div class="mb-3">
        <h1>{{ $berita->judul }}</h1>
    </div>
    @endguest
    <div class="content mb-4">
        <p>{{ $berita->konten }}</p>
    </div>
    @if($berita->gambar)
    <div class="mb-4">
        <img src="{{ asset('image/' . $berita->gambar) }}" alt="Gambar Berita" class="img-fluid">
    </div>
    @endif
    <p><small>Dipublikasikan pada: {{ $berita->created_at->format('d M Y') }}</small></p>
</div>
@endsection