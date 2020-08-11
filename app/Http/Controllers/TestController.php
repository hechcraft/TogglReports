<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class TestController extends Controller
{
    public function index()
    {
        $token = '6945021eae60daf4d24d2fb730a80e80';
        $password = 'api_token';
        $response = Http::withBasicAuth($token, $password)->get('https://www.toggl.com/api/v8/me');

        $responseDecode = collect(json_decode($response));
        $data = array();
        $data['fullname'] = data_get($responseDecode, 'data.fullname');
        foreach (data_get($responseDecode, 'data.workspaces') as $item) {
            $data['workspaceId'][] = data_get($item, 'id');
        }
        $durrations = array();
        foreach ($data['workspaceId'] as $item) {
            $response = Http::withBasicAuth($token, $password)->get('https://toggl.com/reports/api/v2/details', [
                'user_agent' => 'hechcraft@gmail.com',
                'workspace_id' => $item,
                'since' => '2020-08-01',
                'until' => '2020-08-12',
            ]);
            foreach (data_get($response, 'data') as $item) {
                $durrations[$this->secondToTime($item['dur'])] = $item['project'];
            }
        }
        dd($durrations);
    }

    private function secondToTime($mseconds)
    {
        $time = round($mseconds * 0.001);
        return sprintf('%02d:%02d:%02d', ($time / 3600), ($time / 60 % 60), $time % 60);
    }
}
