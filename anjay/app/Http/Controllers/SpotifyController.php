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
        // Ambil token Spotify
        $tokenRes = Http::asForm()->post('https://accounts.spotify.com/api/token', [
            'grant_type' => 'client_credentials',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret
        ]);

        $accessToken = $tokenRes->json()['access_token'] ?? null;

        $tracks = [];

        if($accessToken) {
            $playlistRes = Http::withHeaders([
                'Authorization' => "Bearer $accessToken"
            ])->get("https://api.spotify.com/v1/playlists/{$this->playlistId}/tracks");

            dd($playlistRes->json());
            $tracks = $playlistRes->json()['items'] ?? [];
        }

        // fallback manual jika API gagal
        if(empty($tracks)) {
            $tracks = [
                [
                    'track' => [
                        'name' => 'Hari Bersamanya',
                        'artists' => [['name' => 'Sheila On 7']],
                        'album' => ['images' => [['url' => 'https://i.scdn.co/image/ab67616d0000b273e8d4f0596d66ccbe5241918d']]],
                        'external_urls' => ['spotify' => 'https://open.spotify.com/track/1ylY6UrF7cmOZ9GDOxrfk8']
                    ]
                ],
                [
                    'track' => [
                        'name' => 'Dan',
                        'artists' => [['name' => 'Sheila On 7']],
                        'album' => ['images' => [['url' => 'https://i.scdn.co/image/ab67616d0000b273e8d4f0596d66ccbe5241918d']]],
                        'external_urls' => ['spotify' => 'https://open.spotify.com/track/1nfOP7xNHeFSPOlziXswJc']
                    ]
                ],
                [
                    'track' => [
                        'name' => 'Sephia',
                        'artists' => [['name' => 'Sheila On 7']],
                        'album' => ['images' => [['url' => 'https://i.scdn.co/image/ab67616d0000b273e8d4f0596d66ccbe5241918d']]],
                        'external_urls' => ['spotify' => 'https://open.spotify.com/track/0TJ6RtLG8a1zXAmz4sh9mU']
                    ]
                ],
            ];
        }

        shuffle($tracks);
        $top3 = array_slice($tracks, 0, 3);

        return view('dashboard.index', ['tracks' => $top3]);
    }
}
