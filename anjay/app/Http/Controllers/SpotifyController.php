<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class SpotifyController extends Controller
{
    /**
     * Ambil access token Spotify (Client Credentials Flow)
     */
    private function getAccessToken()
    {
        return cache()->remember('spotify_token', 3600, function () {
            $response = Http::asForm()->post('https://accounts.spotify.com/api/token', [
                'grant_type' => 'client_credentials',
                'client_id' => env('SPOTIFY_CLIENT_ID'),
                'client_secret' => env('SPOTIFY_CLIENT_SECRET'),
            ]);

            $data = $response->json();

            // Pastikan token berhasil didapat
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
        $accessToken = $this->getAccessToken();
        $playlistId = '38QnPhHZa2umQm45xPTo1H'; // ganti dengan ID milikmu

        // 1) Ambil metadata playlist (judul, gambar, link, total track)
        $playlistRes = Http::withToken($accessToken)->get(
            "https://api.spotify.com/v1/playlists/{$playlistId}",
            ['fields' => 'name,external_urls,images,tracks.total']
        );

        if ($playlistRes->failed()) {
            return view('dashboard', ['playlist' => null, 'tracks' => []]);
        }

        $playlist = $playlistRes->json();
        $total = data_get($playlist, 'tracks.total', 0);

        // 2) Ambil sebuah "jendela" hingga 100 lagu mulai dari offset acak,
        // supaya sampling acak tetap menyebar meski playlist >100 lagu
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
        // Filter entri null/unavailable
        $items = array_values(array_filter($items, fn($i) => !empty($i['track'])));

        // 3) Pilih 3 lagu acak
        if (count($items) > 3) {
            $keys = (array) array_rand($items, 3);
            $randomTracks = array_map(fn($k) => $items[$k], $keys);
        } else {
            $randomTracks = $items;
        }

        return view('dashboard', [
            'playlist' => $playlist,     // metadata (judul, gambar, link)
            'tracks'   => $randomTracks, // 3 lagu acak
            // 'totalTracks'  => $total,
        ]);
    }
}
