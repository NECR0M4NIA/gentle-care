<?php


namespace App\Services;

use Illuminate\Support\Facades\Http;

class YoutubeService
{
    public function search(string $query, int $max = 3): array
    {
        $response = Http::get('https://www.googleapis.com/youtube/v3/search', [
            'key'         => config('services.youtube.key'),
            'query'       => $query,
            'part'        => 'snippet',
            'type'        => 'video',
            'maxResults'  => $max,
            'relevanceLanguage' => 'fr',
        ]);

        return $response->json('items', []);
    }
}