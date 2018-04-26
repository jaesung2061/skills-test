<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function home()
    {
        $productFileNames = array_filter(scandir(storage_path('app')), function ($filename) {
            return ends_with($filename, '.json');
        });

        $products = collect(array_map(function ($fileName) {
            $fileContents = \File::get(storage_path("app/$fileName"));

            return json_decode($fileContents, true);
        }, $productFileNames));

        $products = $products->sortBy('created_at');

        return view('home', compact('products'));
    }
}
