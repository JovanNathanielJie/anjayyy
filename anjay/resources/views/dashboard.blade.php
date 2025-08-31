<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $playlist['name'] ?? 'Spotify Playlist' }} 💙</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card:hover {
            transform: translateY(-5px);
            transition: 0.3s;
        }
        .card-img-top {
            height: 180px;
            object-fit: cover;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container py-5">

        {{-- Header Playlist --}}
        <div class="text-center mb-5">
            @if(isset($playlist['images'][0]['url']))
                <img src="{{ $playlist['images'][0]['url'] }}" width="200" class="rounded mb-3">
            @endif
            <h1>{{ $playlist['name'] }}</h1>
            <p class="text-muted">{{ $playlist['description'] ?? '' }}</p>
            <p>Total Tracks: {{ $totalTracks }} | Unique Artists: {{ $uniqueArtists }}</p>
        </div>

        {{-- List Tracks --}}
        @if($paginatedTracks->isEmpty())
            <p class="text-center text-muted">Tidak ada lagu untuk ditampilkan 😢</p>
        @else
            <div class="row">
                @foreach($paginatedTracks as $track)
                    <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                        <div class="card shadow-sm h-100">
                            @if($track['cover'])
                                <img src="{{ $track['cover'] }}" class="card-img-top" alt="{{ $track['name'] }}">
                            @endif
                            <div class="card-body text-center d-flex flex-column">
                                <h5 class="card-title">{{ $track['name'] }}</h5>
                                <p class="card-text">{{ $track['artist'] }}</p>
                                <a href="{{ $track['url'] }}" target="_blank" class="btn btn-primary mt-auto">Play on Spotify</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center mt-4">
                <nav aria-label="Page navigation">
                    {{ $paginatedTracks->links('pagination::bootstrap-5') }}
                </nav>
            </div>
        @endif

    </div>
</body>
</html>
