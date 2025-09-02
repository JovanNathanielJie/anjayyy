@extends('layout.main')

@section('content')
<div class="text-center mb-5">
    <h2 class="mb-3">For Ella 🎵</h2>
    <p class="lead text-muted">
        Setiap alunan musik di sini dipilih khusus,<br>
        mengalir bagai cahaya lembut yang menari di hatimu.<br>
        Semuanya adalah playlist yang dibuat untukmu, Ella,<br>
        agar setiap momenmu terasa lebih indah dan berwarna.
    </p>
</div>

<div class="row">
    <!-- Indie -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="card p-3 text-center shadow-sm h-100">
            <h5 class="mb-3">Indie</h5>
            <a href="https://open.spotify.com/playlist/7oEQXUIQA9Rg6COJ4osfvN?si=f5d8aeed146c4bf3"
               target="_blank" class="btn btn-primary text-white">
               Buka Playlist <i class="fab fa-spotify"></i>
            </a>
        </div>
    </div>

    <!-- Happy -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="card p-3 text-center shadow-sm h-100">
            <h5 class="mb-3">Happy</h5>
            <a href="https://open.spotify.com/playlist/4hGtl0MgqdSnIM11LuKyWe?si=f3b5a7e2e8b44408"
               target="_blank" class="btn btn-success text-white">
               Buka Playlist <i class="fab fa-spotify"></i>
            </a>
        </div>
    </div>

    <!-- Cheerful -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="card p-3 text-center shadow-sm h-100">
            <h5 class="mb-3">Cheerful</h5>
            <a href="https://open.spotify.com/playlist/4a6fyQLhoaDyedTgxW1s0Y?si=a38889ad9c584ac2"
               target="_blank" class="btn btn-warning text-white">
               Buka Playlist <i class="fab fa-spotify"></i>
            </a>
        </div>
    </div>

    <!-- Vibing -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="card p-3 text-center shadow-sm h-100">
            <h5 class="mb-3">Vibing</h5>
            <a href="https://open.spotify.com/playlist/1pQTfydbZbzbQPiz2QY3Bs?si=b16087ccaccd498d"
               target="_blank" class="btn btn-danger text-white">
               Buka Playlist <i class="fab fa-spotify"></i>
            </a>
        </div>
    </div>
</div>
@endsection
