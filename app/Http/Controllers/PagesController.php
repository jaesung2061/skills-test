<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function home()
    {
        $products = $this->getProducts();
        $totalInventoryValue = $this->calculateTotalInventoryValue($products);

        return view('home', compact('products', 'totalInventoryValue'));
    }

    /**
     * @return \Illuminate\Support\Collection|static
     */
    protected function getProducts()
    {
        $productFileNames = array_filter(scandir(storage_path('app')), function ($filename) {
            return ends_with($filename, '.json');
        });

        $products = collect(array_map(function ($fileName) {
            $fileContents = \File::get(storage_path("app/$fileName"));

            return json_decode($fileContents, true);
        }, $productFileNames));

        $products = $products->sortBy('created_at');
        return $products;
    }

    /**
     * @param $products
     * @return float|int
     */
    protected function calculateTotalInventoryValue($products)
    {
        $totalInventoryValue = 0;

        foreach ($products as $product) {
            $totalInventoryValue += $product['quantity'] * $product['price'];
        }
        return $totalInventoryValue;
    }
}
