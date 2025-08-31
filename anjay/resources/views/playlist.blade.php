@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $playlist['name'] }}</h2>
    <p>{{ $playlist['description'] ?? '' }}</p>

    <ul>
        @foreach ($paginatedTracks as $track)
            <li style="margin-bottom: 15px; display: flex; align-items: center; list-style: none;">
                @if($track['cover'])
                    <img src="{{ $track['cover'] }}" width="60" height="60" style="border-radius: 5px; margin-right: 10px;">
                @endif
                <div>
                    <a href="{{ $track['url'] }}" target="_blank" style="font-weight: bold; text-decoration: none;">
                        {{ $track['name'] }}
                    </a><br>
                    <small>{{ $track['artist'] }}</small>
                </div>
            </li>
        @endforeach
    </ul>

    <div style="margin-top: 20px;">
        {{ $paginatedTracks->links() }}
    </div>
</div>
@endsection
