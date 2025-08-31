<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SpotifyController extends Controller
{
    private $clientId = '11dda9b0b23147ccbae9a6a38a60222c';
    private $clientSecret = 'd6b066c43b384a3e82f9e9353c7eba27';
    private $playlistId = '38QnPhHZa2umQm45xPTo1H';

    public function showTop3()
    {
        // Ambil token dari Spotify
        $tokenRes = Http::asForm()->post('https://accounts.spotify.com/api/token', [
            'grant_type' => 'client_credentials',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret
        ]);

        $accessToken = $tokenRes->json()['access_token'];

        // Ambil semua lagu dari playlist
        $playlistRes = Http::withHeaders([
            'Authorization' => "Bearer $accessToken"
        ])->get("https://api.spotify.com/v1/playlists/{$this->playlistId}/tracks");

        $tracks = $playlistRes->json()['items'];

        // Acak lagu
        shuffle($tracks);

        // Ambil 3 lagu pertama
        $top3 = array_slice($tracks, 0, 3);

        return view('dashboard.spotify_top3', ['tracks' => $top3]);
    }
}
