@extends('layouts.main')

@section('title', 'Top 3 Song Recs of the Day')

@section('content')
<div class="row">
    @foreach($tracks as $item)
    <div class="col-md-4 mb-3">
        <div class="card">
            <img src="{{ $item['track']['album']['images'][0]['url'] }}" class="card-img-top" alt="{{ $item['track']['name'] }}">
            <div class="card-body text-center">
                <h5>{{ $item['track']['name'] }}</h5>
                <p>{{ $item['track']['artists'][0]['name'] }}</p>
                <a href="{{ $item['track']['external_urls']['spotify'] }}" target="_blank" class="btn btn-primary">Play on Spotify</a>
            </div>
        </div>
    </div>
@endforeach
</div>
@stop
