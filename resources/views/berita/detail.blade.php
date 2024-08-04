@extends('layouts.main')

@section('content')
<section class="counts section-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-12 mb-5">
                        <div class="card">
                            <div class="card-body">
                                <p>Berita >> <a href="{{ $berita->slug }}">{{ $berita->judul }}</a></p>
                                <h1>{{ $berita->judul }}</h1>

                                <div class="news-date mb-4">
                                    <span class="mr-3"> <i class="bi bi-stopwatch-fill"></i> {{ $berita->created_at->diffForHumans() }}</span> |
                                    <span class="mr-3"><i class="bi bi-person-circle"> {{ $berita->user->name }}</i></span> |
                                    <span><i class="bi bi-fire">Dibaca {{ $berita->views }} Kali</i></span>
                                </div>

                                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Andalan" class="img-fluid rounded mb-5" style="height: 450px; width: 100%;">
                                <p>{!! $berita->body !!}</p>

                                <i class="bi bi-tags"></i> <a href="#" type="button" class="btn btn-secondary btn-sm my-2">{{ $berita->kategori->kategori }}</a>
                            </div>
                        </div>
                    </div>

                    {{-- Comment Form --}}
                    <div class="col-md-12 mb-5">
                        <div class="card">
                            <div class="container mb-3">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <h4 class="mt-3 mb-5">Komentar</h4>

                                            @foreach ($berita->comments as $comment)
                                                @php
                                                    $emailHash = md5(strtolower(trim($comment->email)));
                                                    $avatarUrl = "https://www.gravatar.com/avatar/{$emailHash}?s=65";
                                                @endphp

                                                <div class="comment-container mb-4 d-flex align-items-start">
                                                    <div class="comment-avatar me-3">
                                                        <img class="rounded-circle shadow-1-strong" src="{{ $avatarUrl }}" alt="Avatar" width="65" height="65">
                                                    </div>
                                                    <div class="comment-content flex-grow-1">
                                                        <div class="comment-header d-flex justify-content-between align-items-center">
                                                            <h5>{{ $comment->nama }}</h5>
                                                            <a href="javascript:void(0)" onclick="toggleReplyForm({{ $comment->id }})" class="reply"><i class="bi bi-reply-fill"></i> Balas</a>
                                                        </div>
                                                        <time datetime="2020-01-01"> {{ $comment->created_at->diffForHumans() }}</time>
                                                        <p class="mt-2">{{ $comment->body }}</p>
                                                    </div>
                                                </div>

                                                <!-- Comment Reply -->
                                                @foreach ($comment->replies as $reply)
                                                    @php
                                                        $replyEmailHash = md5(strtolower(trim($reply->email)));
                                                        $replyAvatarUrl = "https://www.gravatar.com/avatar/{$replyEmailHash}?s=65";
                                                    @endphp
                                                    <div class="comment-container my-4 ms-5 d-flex align-items-start">
                                                        <div class="comment-avatar me-3">
                                                            <img class="rounded-circle shadow-1-strong" src="{{ $replyAvatarUrl }}" alt="Avatar" width="65" height="65">
                                                        </div>
                                                        <div class="comment-content flex-grow-1">
                                                            <div class="comment-header d-flex justify-content-between align-items-center">
                                                                <h5>{{ $reply->nama }}</h5>
                                                            </div>
                                                            <time datetime="2020-01-01">{{ \Carbon\Carbon::parse($reply->created_at)->diffForHumans() }}</time>
                                                            <p class="mt-2">{{ $reply->body }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <!-- Comment Reply Form -->
                                                <div id="replyForm{{ $comment->id }}" class="reply-form mb-3" style="display: none;">
                                                    <form action="/berita/{{ $berita->slug }}/reply" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{ $comment->id }}" name="comment_id">
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" placeholder="Nama" name="replyNama">
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="email" class="form-control" placeholder="Email" name="replyEmail">
                                                        </div>
                                                        <div class="mb-3">
                                                            <textarea class="form-control" placeholder="Balasan Komentar" name="replyBody" rows="3"></textarea>
                                                        </div>
                                                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                                        <button type="submit" class="btn btn-primary btn-sm">Kirim Balasan</button>
                                                    </form>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="card-body">
                                <h5 class="mb-4">Tinggalkan Komentar : </h5>
                                <form method="POST" action="/berita/{{ $berita->slug }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama">
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="body" class="form-label">Komentar</label>
                                        <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="6"></textarea>
                                        @error('body')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary float-end">Kirim Komentar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="card">
                        <div class="card-body">
                            <h4>Berita Populer</h4>
                            <div class="populer-post mb-5">
                                @foreach ($beritaPopuler as $berita)
                                    <div class="row mt-3">
                                        <div class="col-md-5">
                                            <img src="{{ asset('storage/' . $berita->gambar) }}" width="100%" height="100%" style="border-radius: 5px">
                                        </div>
                                        <div class="col-md-7 mt-2">
                                            <a href="/berita/{{ $berita->slug }}" style="color: inherit;"><h6>{{ $berita->judul }}</h6></a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card my-3">
                        <div class="card-body">
                            <h4>Kategori</h4>
                            <div class="populer-post mb-5">
                                <div class="row mt-3">
                                    <div class="col">
                                        @foreach ($kategories as $kategori)
                                            <ul>
                                                <p><i class="bi bi-hash"></i> <a href="/kategori/{{ $kategori->slug }}" style="color: inherit;">{{ $kategori->kategori }}</a></p>
                                            </ul>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    function toggleReplyForm(commentId) {
        var replyForm = document.getElementById('replyForm' + commentId);
        var formDisplayStyle = window.getComputedStyle(replyForm).getPropertyValue('display');
        if (formDisplayStyle === 'none') {
            replyForm.style.display = 'block';
        } else {
            replyForm.style.display = 'none';
        }
    }
</script>

@endsection
