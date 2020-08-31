<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('order')->with('data', $sortedData);
    }
}
