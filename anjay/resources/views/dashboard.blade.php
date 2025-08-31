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
            @if(session('user_name'))
                <h2>Halo, {{ session('user_name') }} 💙</h2>
            @endif

            @if (isset($playlist['images'][0]['url']))
                <img src="{{ $playlist['images'][0]['url'] }}" width="200" class="rounded mb-3">
            @endif

            <h1>{{ $playlist['name'] }}</h1>
            <p class="text-muted">{{ $playlist['description'] ?? '' }}</p>
        </div>

        {{-- List Tracks --}}
        {{-- Header playlist (aman kalau kosong) --}}
        @if (!empty($playlist))
            <div class="mb-4">
                <h2 class="text-xl font-semibold">
                    {{ data_get($playlist, 'name', 'Playlist') }}
                </h2>
                <a href="{{ data_get($playlist, 'external_urls.spotify') }}" target="_blank">
                    Buka di Spotify
                </a>
            </div>
        @endif

        {{-- 3 lagu acak dalam grid --}}
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse ($tracks as $item)
                @php $t = $item['track'] ?? null; @endphp
                @if ($t)
                    <div class="col">
                        <div class="card h-100">
                            {{-- Gambar album --}}
                            @if (!empty($t['album']['images'][0]['url']))
                                <img src="{{ $t['album']['images'][0]['url'] }}" class="card-img-top"
                                    alt="{{ $t['name'] }}">
                            @endif

                            <div class="card-body text-center">
                                {{-- Judul lagu --}}
                                <h5 class="card-title">
                                    <a href="{{ data_get($t, 'external_urls.spotify') }}" target="_blank"
                                        class="text-decoration-none">
                                        {{ data_get($t, 'name') }}
                                    </a>
                                </h5>

                                {{-- Nama artis --}}
                                <p class="card-text text-muted">
                                    {{ data_get($t, 'artists.0.name') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <p class="text-center">Tidak ada lagu yang bisa ditampilkan.</p>
            @endforelse
        </div>
    </div>
</body>

</html>
