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
        $playlistId = '37i9dQZF1DXcBWIGoYBM5M'; // Ganti dengan playlistmu
        $accessToken = $this->getAccessToken();

        $response = Http::withToken($accessToken)
            ->get("https://api.spotify.com/v1/playlists/$playlistId");

        $playlist = $response->json();

        $tracks = collect($playlist['tracks']['items'])->map(function ($item) {
            return [
                'name'   => $item['track']['name'],
                'artist' => $item['track']['artists'][0]['name'],
                'url'    => $item['track']['external_urls']['spotify'],
                'cover'  => $item['track']['album']['images'][1]['url'] ?? null,
            ];
        });

        $totalTracks = $tracks->count();
        $uniqueArtists = $tracks->pluck('artist')->unique()->count();

        // Pagination 10 lagu per halaman
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $tracks->slice(($currentPage - 1) * $perPage, $perPage)->all();

        $paginatedTracks = new LengthAwarePaginator(
            $currentItems,
            $tracks->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url()]
        );

        return view('dashboard', compact('playlist', 'paginatedTracks', 'totalTracks', 'uniqueArtists'));
    }
}
