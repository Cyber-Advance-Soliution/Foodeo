<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductCategory;


class ApiCategoryController extends Controller
{
	public function index()
    {
        $productCategories = ProductCategory::get();
	
		$response = [
			'Message' => 'success',
			'Status' => 1,
			'Data' => [
				'productCategories' => $productCategories,
			]
		];
		
        return response()->json($response);
    }

    public function store(ProductCategoryRequest $request)
    {
        $ProductCategory = ProductCategory::create($request->all());

        return response()->json($ProductCategory, 201);
    }

    public function show($id)
    {
        $ProductCategory = ProductCategory::findOrFail($id);

        return response()->json($ProductCategory);
    }

    public function update(ProductCategoryRequest $request, $id)
    {
        $ProductCategory = ProductCategory::findOrFail($id);
        $ProductCategory->update($request->all());

        return response()->json($ProductCategory, 200);
    }

    public function destroy($id)
    {
        ProductCategory::destroy($id);

        return response()->json(null, 204);
    }
}
