<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class OrderController extends Controller
{
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
        $test = $this->getIdGames("Halo");
        dd($this->getGamesCover(data_get($test,'0.id')));
//        return view('order')->with('data', $sortedData);
    }

    private function getIdGames($topFivesGames)
    {
        $response = Http::withHeaders([
            'user-key' => env('IGDB_TOKEN')
        ])->post("https://api-v3.igdb.com/games", [
            'fields' => 'name',
            'search' => $topFivesGames,
        ]);
        $idGames = json_decode($response);
        return $idGames;
    }

    private function getGamesCover($idGames){
//        $response = Http::withHeaders([
//            'user-key' => env('IGDB_TOKEN')
//        ])->post('https://api-v3.igdb.com/covers', [
//            'fields' => 'url',
//            'where game = 6803'
//        ]);
        $headers = ["user-key" => env('IGDB_TOKEN')];
        $body = "fields url; where game = 6803ж ";
        $client = new Client();
        $response = $client->request('POST', 'https://api-v3.igdb.com/covers',['headers' => $headers, 'body' => $body]);
        $gamesCover = json_decode($response);
        return $gamesCover;
    }

    private function secondToTime($mseconds)
    {
        $time = round($mseconds * 0.001);
        return sprintf('%02d:%02d:%02d', ($time / 3600), ($time / 60 % 60), $time % 60);
    }
}
