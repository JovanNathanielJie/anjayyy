@extends('layout.main')

@section('content')
<div class="container mt-4">

    <!-- Kata Sambutan -->
    <div class="text-center my-4">
        <h1 class="fw-bold text-dark gradient-text">
            ✨ Halo, Ella! ✨
        </h1>
        <p class="lead text-secondary">
            Semoga harimu menyenangkan ya 💙
        </p>
        <p class="text-muted">
            Aku bikinin halaman ini khusus buat kamu, biar kita bisa dengerin musik bareng-bareng 🎶
        </p>
    </div>
    <br><br>

    @if ($playlist)
        <!-- Playlist Info -->
        <div class="card shadow-lg mb-4 border-0" style="border-radius: 20px; background: linear-gradient(135deg, #007BFF, #00C9FF); color: white;">
            <div class="row g-0">
                <div class="col-md-3 d-flex align-items-center justify-content-center">
                    @if (!empty($playlist['images'][0]['url']))
                        <img src="{{ $playlist['images'][0]['url'] }}" alt="Playlist Cover" class="img-fluid" style="border-radius: 20px 0 0 20px; max-height: 100%;">
                    @else
                        <div class="p-5">No Image</div>
                    @endif
                </div>
                <div class="col-md-9">
                    <div class="card-body">
                        <h4 class="card-title fw-bold">Playlist Buat Orang Terkeren!</h4> <br>
                        <p class="card-text">{{ $playlist['description'] ?? 'No description available.' }}</p>
                        <p class="card-text"><small>Total Tracks: {{ $playlist['tracks']['total'] ?? 0 }}</small></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Random Tracks -->
        <div class="row">
            @foreach ($tracks as $track)
                @php
                    $t = $track['track'] ?? null;
                @endphp
                @if ($t)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm h-100 border-0" style="border-radius: 20px; background: #f8f9fa;">
                            @if (!empty($t['album']['images'][0]['url']))
                                <img src="{{ $t['album']['images'][0]['url'] }}" class="card-img-top" alt="Album Cover" style="border-radius: 20px 20px 0 0;">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title text-primary fw-bold">{{ $t['name'] ?? 'Unknown Track' }}</h5>
                                <p class="card-text mb-1">
                                    <strong>Artist:</strong> {{ collect($t['artists'])->pluck('name')->join(', ') }}
                                </p>
                                <p class="card-text mb-1">
                                    <strong>Duration:</strong> {{ gmdate("i:s", ($t['duration_ms'] ?? 0) / 1000) }}
                                </p>
                                @if (!empty($t['preview_url']))
                                    <audio controls class="w-100 mt-2">
                                        <source src="{{ $t['preview_url'] }}" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>
                                @else
                                    <p class="text-muted">No preview available</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <!-- Full Playlist Card -->
        <div class="card shadow-lg mt-4 text-center border-0" style="border-radius: 20px; background: linear-gradient(135deg, #00C9FF, #92FE9D); color: #333;">
            <div class="card-body">
                <h5 class="card-title fw-bold">🎶 Full Playlist di Spotify</h5>
                <p class="card-text">Kalau mau dengerin fullnya, klik tombol di bawah ya:</p>
                <a href="https://open.spotify.com/playlist/38QnPhHZa2umQm45xPTo1H?si=6ee4f85cb23b4163"
                   target="_blank"
                   class="btn btn-dark fw-bold px-4 py-2 rounded-pill shadow-sm">
                    Buka di Spotify
                </a>
            </div>
        </div>

        <!-- Pesan Penutup -->
        <div class="card shadow-lg my-5 border-0" style="border-radius: 20px; background: #fff;">
            <div class="card-body p-4">
                <h3 class="text-center fw-bold mb-4 gradient-text">Hello, Orang Lucu!</h3>
                <p class="fst-italic text-secondary" style="font-size: 1.1rem; line-height: 1.8;">
                    Hey, Ella! My favorite person in the entire universe. 🌟 <br><br>
                    I’ve been wanting to create something special for you, but I couldn’t quite figure out what could truly capture how amazing you are. Then, one day, a thought sparked in my mind: what if I made a little corner of the internet just for you? After all, how could one of the kindest, brightest, and most wonderful souls in the world not have her own website? Hehe. <br><br>
                    If you were wondering why I suddenly asked about your favorite color, now you know. It’s for this very little project, made entirely with you in mind. <br><br>
                    Up there, you’ll find a song algorithm I’ve crafted. A collection of tunes I hope brighten your days, songs you might already love, and melodies I think you deserve to hear. There’s also a link to the full playlist, named ‘Orang Keren’, because, well… that’s exactly what you are. <br><br>
                    I’ve also prepared some postcards, filled with words and a little adoration for you. I know life has been hectic, and this month might still be a whirlwind, but I hope these small things bring a smile to your face. You light up the place when you smile! <br><br>
                    And because moods are a little universe of their own, I’ve made playlists for every shade of how you might feel: cheerful, inspired, or simply wanting to wander into some indie delights. I hope they make your heart feel lighter, just as your presence always brightens mine. <br><br>
                    So… that’s my little gift to you, Ella. A small corner of the world built for someone who makes mine so much brighter. Thank you, from the bottom of my heart, for being exactly who you are. 💖
                </p>
            </div>
        </div>
    @else
        <div class="alert alert-danger text-center">Gagal mengambil data playlist.</div>
    @endif
</div>

<!-- Custom Gradient Text -->
<style>
  .gradient-text {
    background: linear-gradient(90deg, #ff7eb3, #65c7f7, #0052d4);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }
</style>
@endsection
