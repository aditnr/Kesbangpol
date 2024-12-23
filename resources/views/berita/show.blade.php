@extends('layouts.template')
@section('title', $berita->judul)
@section('content')
<section id="berita" class="contact section">
    <div class="container section-title mt-5" data-aos="fade-up">
        <p>{{ $berita->judul }}</p>
    </div>
    <div class="container">
        @if($berita->gambar)
        <div class="mb-4" data-aos="zoom-in">
            <img src="{{ asset($berita->gambar) }}" alt="Gambar Berita" class="img-fluid rounded">
        </div>
        @endif
        <div class="content mb-4" data-aos="fade-in">
            <p>{!! nl2br(preg_replace('/\n\s*\n/', "\n", trim($berita->konten))) !!}</p>
        </div>
        <p><small>Dipublikasikan pada: {{ $berita->created_at->format('d M Y') }}</small></p>
        <div class="interaksi-buttons">
            <form action="{{ url('/berita/' . $berita->id . '/like') }}" method="POST" class="d-inline-block">
                @csrf
                <button type="submit" class="btn-like">
                    <i class="fa-regular fa-thumbs-up fa-lg" style="color: #1877f2;"></i>
                    <span class="count">{{ $berita->likes }}</span>
                </button>
            </form>
            <form action="{{ url('/berita/' . $berita->id . '/dislike') }}" method="POST" class="d-inline-block">
                @csrf
                <button type="submit" class="btn-dislike">
                    <i class="fa-regular fa-thumbs-down fa-lg" style="color: #ff0000;"></i>
                    <span class="count">{{ $berita->dislikes }}</span>
                </button>
            </form>
            <button id="comment-toggle" class="btn-comment">
                <i class="fa-regular fa-comment fa-lg" style="color: #25d366;"></i>
                <span class="count">{{ $comments_count }}</span>
            </button>
            <button id="share-btn" class="btn-share">
                <i class="fa-solid fa-share-from-square fa-lg" style="color: #800080;"></i>
            </button>
        </div>
        <div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fas fa-share" id="shareModalLabel"></h5>
                    </div>
                    <div class="modal-body">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="btn btn-block mb-2">
                            <i class="fab fa-facebook"></i> Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($berita->judul) }}&url={{ urlencode(url()->current()) }}" target="_blank" class="btn btn-block mb-2">
                            <i class="fab fa-twitter"></i> Twitter
                        </a>
                        <a href="https://api.whatsapp.com/send?text={{ urlencode($berita->judul) }} - {{ urlencode(url()->current()) }}" target="_blank" class="btn btn-block mb-2">
                            <i class="fab fa-whatsapp"></i> WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="comment-container" style="display: none;">
            <div id="comment-form" class="mb-3">
                <form action="{{ url('/berita/' . $berita->id . '/comment') }}" method="POST">
                    @csrf
                    <div class="textarea-wrapper">
                        <textarea name="content" required placeholder="Tulis komentar..." class="form-control" rows="3"></textarea>
                        <button type="submit" class="btn btn-success submit-comment-btn">
                            <i class="fa fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div id="comments-list">
                @if($berita->comments->isNotEmpty())
                @foreach($berita->comments as $comment)
                <div class="comment-card">
                    <div class="comment-header">
                        <strong>{{ $comment->user_id == 0 ? 'Anonim' : $comment->user->name }}</strong>
                        <small class="text-muted">{{ $comment->created_at->format('d M Y H:i') }}</small>
                    </div>
                    <div class="comment-body">
                        <p>{{ $comment->content }}</p>
                    </div>
                </div>
                @endforeach
                @else
                <p>Tidak ada komentar.</p>
                @endif
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById("comment-toggle").addEventListener("click", function() {
        var commentContainer = document.getElementById("comment-container");
        if (commentContainer.style.display === "none") {
            commentContainer.style.display = "block";
        } else {
            commentContainer.style.display = "none";
        }
    });
    document.getElementById("share-btn").addEventListener("click", function() {
        $('#shareModal').modal('show');
    });
</script>
<style>
    .interaksi-buttons {
        display: flex;
        gap: 20px;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .interaksi-buttons button {
        background-color: transparent;
        border: none;
        font-size: 1.2rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        color: #555;
    }

    .interaksi-buttons i {
        margin-right: 5px;
    }

    .btn-share:hover,
    .btn-like:hover,
    .btn-dislike:hover,
    .btn-comment:hover {
        opacity: 0.5;
    }

    .count {
        font-size: 1rem;
    }

    .comment-card {
        background-color: #f9f9f9;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 15px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .comment-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .comment-header strong {
        font-size: 1rem;
        color: #333;
    }

    .comment-header small {
        color: #777;
    }

    .comment-body p {
        color: #555;
        font-size: 1rem;
        margin: 0;
    }

    .textarea-wrapper {
        position: relative;
    }

    textarea.form-control {
        padding-right: 40px;
    }

    .submit-comment-btn {
        position: absolute;
        right: 10px;
        bottom: 10px;
        background-color: transparent;
        border: none;
        cursor: pointer;
        color: #28a745;
        font-size: 1.2rem;
    }

    .submit-comment-btn:hover {
        color: #218838;
    }

    .submit-comment-btn i {
        margin: 0;
    }
</style>
@endsection