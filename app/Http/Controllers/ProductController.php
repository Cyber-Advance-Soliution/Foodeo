<?php

namespace App\Http\Controllers;

use File;
use Auth;
use Image;
use App\User;
use App\Store;
use SiteHelper;
use App\Product;
use App\ProductBanner;
use App\ProductCategory;
use App\ProductAttribute;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
	
	public function __construct()
    {
        $this->middleware('admin');
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$createdBy = Auth::user()->id;
		
		$model = Product::where('created_by', $createdBy)->get();
		
		return view('product/index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$user = Auth::user();
		$createdBy = $user->id;
		
		if(auth()->user()->can('create-product') && $user->role == 2)
		{
			$userId = $user->userDetail->created_by;
			$parentEmployee = User::where('id', $userId)->first();
			$createdBy = $parentEmployee->userDetail->created_by;
		} 
		
		$stores = Store::where(['created_by' => $createdBy, 'status' => 1, 'visible_status' => 1])->get();
		$productCategories = ProductCategory::where(['created_by' => $createdBy])->get();
		
		return view('product/create', compact('stores', 'productCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	
    public function store(ProductRequest $request)
    { 
		$user = Auth::user();
		$createdBy = $user->id;
		
		$productAttributes = $request['attribute_name'];
		$attributeOptions = $request['option'];
		$optionValues = $request['option_value'];
		
		if ($request->has('product_thumbnail')) 
		{
			$image = $request->file('product_thumbnail');
			$input['imagename'] = SiteHelper::generateRandomString().'.'.$image->getClientOriginalExtension();
		 
			// $destinationPath = public_path('/uploads/product_thumbnails');
			$destinationPath='assets/uploads/product';
				if (!file_exists('assets/uploads/product')) {
					mkdir('assets/uploads/product',0777,true);
				}
			$img = Image::make($image->getRealPath());
			$img->resize(240, 240)->save($destinationPath.'/'.$input['imagename']);
			
			$thumbnailPath = 'assets/uploads/product/' . $input['imagename'];
  		}
				
		$product = [
			'product_name' => $request['product_name'],
			'created_by' => $createdBy,
			'store_id' => $request['store_id'],
			'product_category_id' => $request['product_category_id'],
			'product_price' => $request['product_price'],
			'short_description' => $request['short_description'],
			'long_description' => $request['long_description'],
			'product_thumbnail' => $thumbnailPath,
		];
		
		$productId = Product::create($product)->id;

		if ($request->has('product_banners')) 
		{
			$banners = array_filter($request->file('product_banners'));
			
			foreach($banners as $key => $banner) 
			{
				$uploadedBanner = $request->file('product_banners')[$key];
				$inputOne['banner'] = SiteHelper::generateRandomString().'.'.$uploadedBanner->getClientOriginalExtension();
			 
				// $destinationPathOne = public_path('/uploads/product_banners');
				$destinationPath='assets/uploads/product_banners';
				if (!file_exists('assets/uploads/product_banners')) {
					mkdir('assets/uploads/product_banners',0777,true);
				}
				$imgOne = Image::make($uploadedBanner->getRealPath());
				$imgOne->resize(960, 240)->save($destinationPathOne.'/'.$inputOne['banner']);
				
				$imagePathBanner = 'assets/uploads/product_banners/' . $inputOne['banner'];
				
				$modelBanners = new ProductBanner();
				
				$modelBanners->product_id = $productId;
				$modelBanners->banner = $imagePathBanner;
					
				$modelBanners->save();
			}
  		}
		
		foreach($productAttributes as $key => $attribute)
		{
			$attributeName = $attribute;
			$options = $attributeOptions[$key];
			$values = $optionValues[$key];
			
			$finalOptions = [];
			foreach($options as $keyOne => $option) {
				$option = [
					'option' => $option,
					'value' => $values[$keyOne]
				];
				array_push($finalOptions, $option);
			}
			$serializeOptions = serialize($finalOptions);
			$productAttributeData = [
				'product_id' => $productId,
				'attribute_name' => $attributeName,
				'options' => $serializeOptions
			];
			
			ProductAttribute::create($productAttributeData);
		}
		
		Session::flash('success', 'New Product created successfully');
		
		return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Product::with('productBanners', 'productAttributes')->where(['id' => $id])->first();
		
		$latitude = $model->latitude;
		$longitude = $model->longitude;
		
		$url="https://maps.google.com/maps/api/geocode/json?latlng=" . $latitude . ',' . $longitude ."&key=AIzaSyCgUJGcH0GQUG5Vug-yb1JAp1OIkZEUrzQ";
		
		return view('product/view', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $model = Product::find(['id' => $request->id])->first();

		$user = Auth::user();
		$createdBy = $user->id;
		
		if(auth()->user()->can('products') && $user->role == 2)
		{
			$userId = $user->userDetail->created_by;
			$parentEmployee = User::where('id', $userId)->first();
			$createdBy = $parentEmployee->userDetail->created_by;
		} 
		
		$stores = Store::where(['created_by' => $createdBy, 'status' => 1, 'visible_status' => 1])->get();
		$productCategories = ProductCategory::all();
		
		return view('product/edit', compact('model', 'stores', 'productCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request)
    {
        $user = Auth::user();
		$createdBy = $user->id;
		
		$productId = $request['product_id'];
		
		$model = Product::where('id', $productId)->first();
		$modelbanners = ProductBanner::where('product_id', $productId)->get();
		$modelAttributes = ProductAttribute::where('product_id', $productId)->get();
		
		$productAttributes = $request['attribute_name'];
		$attributeOptions = $request['option'];
		$optionValues = $request['option_value'];
		
		if ($request->has('product_thumbnail')) 
		{
			$image_path = $model->store_thumbnail;
			
			if(file_exists($image_path)) {
				File::delete($image_path);
			}
			
			$image = $request->file('product_thumbnail');
			$input['imagename'] = SiteHelper::generateRandomString().'.'.$image->getClientOriginalExtension();
		 
			// $destinationPath = public_path('/uploads/product_thumbnails');
			$destinationPath='assets/uploads/product';
				if (!file_exists('assets/uploads/product')) {
					mkdir('assets/uploads/product',0777,true);
				}
			$img = Image::make($image->getRealPath());
			$img->resize(240, 240)->save($destinationPath.'/'.$input['imagename']);
			
			$thumbnailPath = 'assets/uploads/product/' . $input['imagename'];
  		}
				
		$product = [
			'product_name' => $request['product_name'],
			'created_by' => $createdBy,
			'store_id' => $request['store_id'],
			'product_category_id' => $request['product_category_id'],
			'product_price' => $request['product_price'],
			'short_description' => $request['short_description'],
			'long_description' => $request['long_description'],
			'product_thumbnail' => $thumbnailPath,
		];
		
		Product::where('id', $productId)->update($product);

		if ($request->has('product_banners')) 
		{
			foreach($modelbanners as $currentBanners)
			{
				$image_path = $currentBanners->banner;
				if(file_exists($image_path)) {
					File::delete($image_path);
				}
				ProductBanner::destroy($currentBanners->id);
			}
			
			$banners = array_filter($request->file('product_banners'));
			
			foreach($banners as $key => $banner) 
			{
				$uploadedBanner = $request->file('product_banners')[$key];
				$inputOne['banner'] = SiteHelper::generateRandomString().'.'.$uploadedBanner->getClientOriginalExtension();
			 
				// $destinationPathOne = public_path('/uploads/product_banners');
				$destinationPath='assets/uploads/product_banners';
				if (!file_exists('assets/uploads/product_banners')) {
					mkdir('assets/uploads/product_banners',0777,true);
				}
				$imgOne = Image::make($uploadedBanner->getRealPath());
				$imgOne->resize(960, 240)->save($destinationPath.'/'.$inputOne['banner']);
				
				$imagePathBanner = 'assets/uploads/product_banners/' . $inputOne['banner'];
				
				$modelBanners = new ProductBanner();
				
				$modelBanners->product_id = $productId;
				$modelBanners->banner = $imagePathBanner;
					
				$modelBanners->save();
			}
  		}
		
		ProductAttribute::where('product_id', $productId)->delete();

		foreach($productAttributes as $key => $attribute)
		{
			$attributeName = $attribute;
			$options = $attributeOptions[$key];
			$values = $optionValues[$key];
			
			$finalOptions = [];
			foreach($options as $keyOne => $option) {
				$option = [
					'option' => $option ,
					'value' => $values[$keyOne]
				];
				array_push($finalOptions, $option);
			}
			// echo "<pre>";
			// print_r($finalOptions);
			
			$serializeOptions = serialize($finalOptions);
			$productAttributeData = [
				'product_id' => $productId,
				'attribute_name' => $attributeName,
				'options' => $serializeOptions
			];
			
			ProductAttribute::create($productAttributeData);
		}
		//exit;
		Session::flash('success', 'Product updated successfully');
		
		return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
	public function productStatus($id)
	{
		$model = Product::find($id);
		if ($model->status==0) {
			$model->status=1;
		}
		else{
			$model->status=0;
			
		}
		$model->save();
		return redirect('products');
	}
}
