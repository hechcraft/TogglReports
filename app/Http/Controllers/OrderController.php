<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    protected $headers;
    protected $gamesIdUri;
    protected $gamesCoverUri;

    public function __construct()
    {
        $this->headers = ["user-key" => env('IGDB_TOKEN')];
        $this->gamesIdUri = 'https://api-v3.igdb.com/games';
        $this->gamesCoverUri = 'https://api-v3.igdb.com/covers';
    }

    public function index(Request $request)
    {
        $sortedData = collect();
        $data = $request->input('selected');
        foreach ($data as $value) {
            $element = explode(' ', $value, 2);
            if ($sortedData->get($element[1]) === null) {
                $sortedData->put($element[1], $element[0]);
            } else {
                $sortedData->put($element[1], +$element[0] + +$sortedData->get($element[1]));
            }
        }
        $sortedData = $sortedData->sortDesc();
        $topFiveGamesId = $this->getTopFiveGamesId($sortedData);
        $topFiveGamesCover = $this->getTopFiveGamesCover($topFiveGamesId);

        return view('order')->with(array('data' => $sortedData, 'amountPictures' => $this->maxTopPictures($sortedData)));
    }

    private function getRequestFromApi($bodyRaw, $requestUri)
    {
        $client = new Client();
        $response = $client->request('POST', $requestUri, [
            'headers' => $this->headers,
            'body' => $bodyRaw
        ]);
        $decodeResponse = json_decode($response->getBody()->getContents());
        return $decodeResponse;
    }

    private function getTopFiveGamesId($sortedData)
    {
        $gamesId = collect();
        $counter = 0;
        foreach ($sortedData as $value => $key) {
            $getIdGamesBody = "search \"$value\"; fields name, popularity;";
            $gamesData = $this->getRequestFromApi($getIdGamesBody, $this->gamesIdUri);
            $gamesId->push($this->sortByPopularity($gamesData));
            if ($gamesId->last() === 0) {
                $gamesId->forget($counter);
            }
            if ($counter === $this->maxTopPictures($sortedData)) {
                break;
            }
            $counter++;
        }
        return $gamesId;
    }

    private function getTopFiveGamesCover($gamesId)
    {
        $gamesCover = collect();
        foreach ($gamesId as $value) {
            $getGamesCover = "fields url; where game = $value;";
            $coverData = $this->getRequestFromApi($getGamesCover, $this->gamesCoverUri);
            $gamesCover->push(data_get($coverData, '0.url'));
        }
        return $gamesCover;
    }

    private function changeSizeCover($urlImages)
    {
        $covers = collect();
        foreach ($urlImages as $value) {
            $coverUrl = explode("/", $value);
            $coverUrl[6] = "t_cover_big";
            $coverUrl = implode("/", $coverUrl);
            $covers->push($coverUrl);
        }
        return $covers;
    }

    private function sortByPopularity($gamesData)
    {
        $maxPopularity = data_get($gamesData, '0.popularity');
        $idMaxElement = 0;
        foreach ($gamesData as $value) {
            $maxPopularity = (data_get($value, 'popularity') > $maxPopularity) ? data_get($value, 'popularity') : $maxPopularity;
        }
        foreach ($gamesData as $value) {
            if (data_get($value, 'popularity') === $maxPopularity) {
                $idMaxElement = data_get($value, 'id');
            }
        }
        return $idMaxElement;
    }

    private function maxTopPictures($sortedData)
    {
        if ($sortedData->count() < 5) {
            return $sortedData->count();
        }
        return 5;
    }

    private function secondToTime($mseconds)
    {
        $time = round($mseconds * 0.001);
        return sprintf('%02d:%02d:%02d', ($time / 3600), ($time / 60 % 60), $time % 60);
    }
}
