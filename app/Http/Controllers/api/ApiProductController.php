<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ApiProductController extends Controller
{
    public function index()
    {
        $products = Product::with('productBanners', 'productAttribues')->get();
	
		$response = [
			'Message' => 'success',
			'Status' => 1,
			'Data' => [
				'products' => $products,
			]
		];
		
        return response()->json($response);
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create($request->all());

        return response()->json($product, 201);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return response()->json($product);
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());

        return response()->json($product, 200);
    }

    public function destroy($id)
    {
        Product::destroy($id);

        return response()->json(null, 204);
    }
}
