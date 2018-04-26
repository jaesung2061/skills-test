<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function home()
    {
        $productFileNames = array_filter(scandir(storage_path('app')), function ($filename) {
            return ends_with($filename, '.json');
        });

        $products = array_map(function ($fileName) {
            $fileContents = \File::get(storage_path("app/$fileName"));

            return json_decode($fileContents, true);
        }, $productFileNames);

//        dd($products);

        return view('home', compact('products'));
    }
}
