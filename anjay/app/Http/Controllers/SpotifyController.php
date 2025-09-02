<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SpotifyController extends Controller
{
    private function getAccessToken()
    {
        $clientId = env('SPOTIFY_CLIENT_ID');
        $clientSecret = env('SPOTIFY_CLIENT_SECRET');

        $response = Http::asForm()
            ->withBasicAuth($clientId, $clientSecret)
            ->post('https://accounts.spotify.com/api/token', [
                'grant_type' => 'client_credentials',
            ]);

        if ($response->failed()) {
            throw new \Exception("Gagal mendapatkan access token Spotify: " . $response->body());
        }

        return $response->json()['access_token'];
    }

    public function dashboard(Request $request)
    {
        if (!$request->session()->has('user_name')) {
            return redirect('/');
        }

        $accessToken = $this->getAccessToken();
        $playlistId = '38QnPhHZa2umQm45xPTo1H';

        // Ambil metadata playlist
        $playlistRes = Http::withToken($accessToken)->get(
            "https://api.spotify.com/v1/playlists/{$playlistId}",
            ['fields' => 'name,description,images,tracks.total']
        );

        if ($playlistRes->failed()) {
            return view('dashboard', ['playlist' => null, 'tracks' => []]);
        }

        $playlist = $playlistRes->json();

        // Ambil data track
        $tracksRes = Http::withToken($accessToken)->get(
            "https://api.spotify.com/v1/playlists/{$playlistId}/tracks",
            [
                'limit'  => 100,
                'fields' => 'items(track(name,preview_url,duration_ms,artists(name),album(images)))',
            ]
        );

        $items = $tracksRes->successful()
            ? collect($tracksRes->json('items'))
                ->filter(fn($i) => !empty($i['track']))
                ->values()
            : collect([]);

        // Ambil 3 lagu random kalau lebih dari 3
        $randomTracks = $items->count() > 3
            ? $items->random(3)
            : $items;

        return view('dashboard.index', [
            'playlist' => $playlist,
            'tracks'   => $randomTracks,
        ]);
    }
}
