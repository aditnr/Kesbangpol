@extends(Auth::check() ? 'layouts.admin' : 'layouts.template')

@section('title', $ormas->judul)

@section('content')
<div class="container">
    @auth
    <div class="d-flex justify-content-between mb-3">
        <h1>{{ $ormas->judul }}</h1>
        <div>
            <a href="{{ route('ormass.edit', $ormas->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('ormass.destroy', $ormas->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus ormas ini?')">Hapus</button>
            </form>
        </div>
    </div>
    @endauth
    @guest
    <div class="mb-3">
        <h1>{{ $ormas->judul }}</h1>
    </div>
    @endguest
    <div class="content mb-4">
        <p>{{ $ormas->konten }}</p>
    </div>
    @if($ormas->gambar)
    <div class="mb-4">
        <img src="{{ asset('image/' . $ormas->gambar) }}" alt="Gambar ormas" class="img-fluid">
    </div>
    @endif
    <p><small>Dipublikasikan pada: {{ $ormas->created_at->format('d M Y') }}</small></p>
</div>
@endsection