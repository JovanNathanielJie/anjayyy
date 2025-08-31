<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SpotifyController extends Controller
{
    /**
     * Ambil access token Spotify (Client Credentials Flow) pakai Basic Auth
     */
    private function getAccessToken()
    {
        return cache()->remember('spotify_token', 3600, function () {
            $clientId = env('SPOTIFY_CLIENT_ID');
            $clientSecret = env('SPOTIFY_CLIENT_SECRET');

            $response = Http::asForm()->withHeaders([
                'Authorization' => 'Basic ' . base64_encode("$clientId:$clientSecret"),
            ])->post('https://accounts.spotify.com/api/token', [
                'grant_type' => 'client_credentials',
            ]);

            $data = $response->json();

            if (!isset($data['access_token'])) {
                throw new \Exception('Gagal mendapatkan access token Spotify: ' . json_encode($data));
            }

            return $data['access_token'];
        });
    }

    /**
     * Tampilkan dashboard playlist Spotify
     */
    public function dashboard(Request $request)
    {
        // Pastikan user sudah login
        if (!$request->session()->has('user_name')) {
            return redirect('/');
        }

        $accessToken = $this->getAccessToken();
        $playlistId = '38QnPhHZa2umQm45xPTo1H'; // Ganti dengan ID playlist kamu

        // Ambil metadata playlist
        $playlistRes = Http::withToken($accessToken)->get(
            "https://api.spotify.com/v1/playlists/{$playlistId}",
            ['fields' => 'name,external_urls,images,tracks.total,description']
        );

        if ($playlistRes->failed()) {
            return view('dashboard', ['playlist' => null, 'tracks' => []]);
        }

        $playlist = $playlistRes->json();
        $total = data_get($playlist, 'tracks.total', 0);

        // Ambil window hingga 100 lagu dari playlist
        $window = min(100, $total ?: 100);
        $start  = ($total > $window) ? random_int(0, $total - $window) : 0;

        $tracksRes = Http::withToken($accessToken)->get(
            "https://api.spotify.com/v1/playlists/{$playlistId}/tracks",
            [
                'limit'  => $window,
                'offset' => $start,
                'fields' => 'items(track(name,external_urls,artists(name),album(images)))'
            ]
        );

        $items = data_get($tracksRes->json(), 'items', []);
        $items = array_values(array_filter($items, fn($i) => !empty($i['track'])));

        // Ambil 3 lagu acak
        if (count($items) > 3) {
            $keys = (array) array_rand($items, 3);
            $randomTracks = array_map(fn($k) => $items[$k], $keys);
        } else {
            $randomTracks = $items;
        }

        return view('dashboard', [
            'playlist' => $playlist,
            'tracks'   => $randomTracks,
        ]);
    }
}
