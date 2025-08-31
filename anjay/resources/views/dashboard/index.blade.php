<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top 3 Recs of the Day 💙</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="mb-4 text-center">Top 3 Recs of the Day 🎵</h1>

        @if(empty($tracks))
            <p class="text-center text-muted">Tidak ada lagu untuk ditampilkan 😢</p>
        @else
            <div class="row">
                @foreach($tracks as $item)
                    @php $track = $item['track']; @endphp
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="{{ $track['album']['images'][0]['url'] }}" class="card-img-top" alt="{{ $track['name'] }}">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $track['name'] }}</h5>
                                <p class="card-text">{{ $track['artists'][0]['name'] }}</p>
                                <a href="{{ $track['external_urls']['spotify'] }}" target="_blank" class="btn btn-primary">Play on Spotify</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>
