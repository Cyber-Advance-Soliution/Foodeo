<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Store;
use App\Helpers\SiteHelper;
use App\StoreType;
use App\Order;
use App\StoreBanner;
use App\StoreCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $createdBy = Auth::user()->id;

        $model = Store::where(['created_by' => $createdBy])->get();

        return view('store/index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $storeCategories = StoreCategory::all();
        $storeTypes = StoreType::all();

        return view('store/create', compact('storeCategories', 'storeTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */


    public function store(StoreRequest $request)
    {
        //	dd($request->all());
        $createdBy = Auth::user()->id;

        // if ($request->has('store_thumbnail'))
        // {
        // $image = $request->file('store_thumbnail');
        // $input['imagename'] = SiteHelper::generateRandomString().'.'.$image->getClientOriginalExtension();

        // $destinationPath = public_path('/uploads/store_thumbnails');
        // $img = Image::make($image->getRealPath());
        // $img->resize(240, 240)->save($destinationPath.'/'.$input['imagename']);

        // $thumbnailPath = 'uploads/store_thumbnails/' . $input['imagename'];
        if (isset($request->store_thumbnail)) {
            $destinationPath = 'assets/uploads/store_thumbnails';
            if (!file_exists('assets/uploads/store_thumbnails')) {
                mkdir('assets/uploads/store_thumbnails', 0777, true);
            }
            //dd($request->store_thumbnail);
            $file = $request->file('store_thumbnail');
            // dd($file);
            $extension = $file->getClientOriginalName();
            // dd($extension);
            $filename = time() . '.' . $extension;
            // dd($filename);
            $request->store_thumbnail->move(public_path('assets/uploads/store_thumbnails'), $filename);
            $thumbnailPath = $destinationPath . '/' . $filename;
            // dd($thumbnailPath);
        }

        // }

        $store = [
            'store_name' => $request['store_name'],
            'store_email' => $request['store_email'],
            'store_contact' => $request['store_contact'],
            'created_by' => $createdBy,
            'store_category_id' => $request['store_category_id'],
            'store_type_id' => $request['store_type_id'],
            'short_description' => $request['short_description'],
            'long_description' => $request['long_description'],
            'cash_on_delivery' => $request['cash_on_delivery'],
            'customer_pickup' => $request['customer_pickup'],
            'delivery_to_customer' => $request['delivery_to_customer'],
            'delivery_charges' => $request['delivery_charges'],
            'latitude' => $request['latitude'],
            'longitude' => $request['longitude'],
            'store_thumbnail' => $thumbnailPath,
            'status' => 1,
        ];

        $storeId = Store::create($store)->id;

        if ($request->has('store_banners')) {
            $banners = $request->file('store_banners');

            foreach ($banners as $key => $banner) {
                $uploadedBanner = $request->file('store_banners')[$key];
                $inputOne['banner'] = SiteHelper::generateRandomString() . '.' . $uploadedBanner->getClientOriginalExtension();
                $destinationPathOne = 'assets/uploads/store_thumbnails';
                if (!file_exists('assets/uploads/store_thumbnails')) {
                    mkdir('assets/uploads/store_thumbnails', 0777, true);
                }
                // $destinationPathOne = public_path('/uploads/store_banners');
                $imgOne = Image::make($uploadedBanner->getRealPath());
                $imgOne->resize(960, 240)->save($destinationPathOne . '/' . $inputOne['banner']);
                $imagePathBanner = 'assets/uploads/store_thumbnails/' . $inputOne['banner'];
                // dd($imagePathBanner);
                $modelBanners = new StoreBanner();
                $modelBanners->store_id = $storeId;
                $modelBanners->banner = $imagePathBanner;
                $modelBanners->save();
            }
        }

        Session::flash('success', 'New store created successfully');

        return redirect('stores');
    }

    public function edit(Request $request)
    {
        $model = Store::find(['id' => $request->id])->first();

        $storeCategories = StoreCategory::all();
        $storeTypes = StoreType::all();


        $latitude = $model->latitude;
        $longitude = $model->longitude;

        $url = "https://maps.google.com/maps/api/geocode/json?latlng=" . $latitude . ',' . $longitude . "&key=AIzaSyBz1jMjJPw1KIAoGbsESx0-4iMTDmLf7nw";

        $curl_return = SiteHelper::getLocation($url);

        $obj = json_decode($curl_return);

        $storeAddress = '';

        if (!empty($obj->results[0]->formatted_address)) {
            $storeAddress = $obj->results[0]->formatted_address;
        }

        return view('store/edit', compact('model', 'storeCategories', 'storeTypes', 'storeAddress'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Store $store
     */
    public function update(Request $request)
    {
        $createdBy = Auth::user()->id;

        $storeId = $request->store_id;

        $currentStore = Store::where('id', $storeId)->first();
        $currentStoreBanners = StoreBanner::where('store_id', $storeId)->get();

        $thumbnailPath = $currentStore->store_thumbnail;

        if ($request->has('store_thumbnail')) {
            $image_path = $currentStore->store_thumbnail;

            if (file_exists($image_path)) {
                File::delete($image_path);
            }
            $destinationPath = 'assets/uploads/store_thumbnails';
            if (!file_exists('assets/uploads/store_thumbnails')) {
                mkdir('assets/uploads/store_thumbnails', 0777, true);
            }

            $image = $request->file('store_thumbnail');
            $input['imagename'] = SiteHelper::generateRandomString() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('assets/uploads/store_thumbnails');
            $img = Image::make($image->getRealPath());
            $img->resize(240, 240)->save($destinationPath . '/' . $input['imagename']);

            $thumbnailPath = 'assets/uploads/store_thumbnails/' . $input['imagename'];
        }

        $store = [
            'store_name' => $request['store_name'],
            'store_email' => $request['store_email'],
            'store_contact' => $request['store_contact'],
            'created_by' => $createdBy,
            'store_category_id' => $request['store_category_id'],
            'store_type_id' => $request['store_type_id'],
            'short_description' => $request['short_description'],
            'long_description' => $request['long_description'],
            'cash_on_delivery' => $request['cash_on_delivery'],
            'customer_pickup' => $request['customer_pickup'],
            'delivery_to_customer' => $request['delivery_to_customer'],
            'delivery_charges' => $request['delivery_charges'],
            'latitude' => $request['latitude'],
            'longitude' => $request['longitude'],
            'store_thumbnail' => $thumbnailPath,
            'status' => 1,
        ];

        Store::where('id', $storeId)->update($store);

        if ($request->has('store_banners')) {
            foreach ($currentStoreBanners as $currentBanners) {
                $image_path = $currentBanners->banner;
                if (file_exists($image_path)) {
                    File::delete($image_path);
                }
                StoreBanner::destroy($currentBanners->id);
            }

            $banners = array_filter($request->file('store_banners'));

            foreach ($banners as $key => $banner) {

                $uploadedBanner = $request->file('store_banners')[$key];
                $inputOne['banner'] = SiteHelper::generateRandomString() . '.' . $uploadedBanner->getClientOriginalExtension();
                // $destinationPathOne = public_path('/uploads/store_banners');
                $destinationPathOne = 'assets/uploads/store_thumbnails';
                if (!file_exists('assets/uploads/store_thumbnails')) {
                    mkdir('assets/uploads/store_thumbnails', 0777, true);
                }
                $imgOne = Image::make($uploadedBanner->getRealPath());
                $imgOne->resize(240, 960)->save($destinationPathOne . '/' . $inputOne['banner']);

                $imagePathBanner = 'assets/uploads/store_thumbnails/' . $inputOne['banner'];

                $modelBanners = new StoreBanner();

                $modelBanners->store_id = $storeId;
                $modelBanners->banner = $imagePathBanner;

                $modelBanners->save();
            }
        }

        return redirect()->route('stores')->with('success', 'Store updated successfully ');
    }

    public function show($id)
    {
        $model = Store::with('storeBanners', 'storeType')->where(['id' => $id])->first();

        $latitude = $model->latitude;
        $longitude = $model->longitude;

        $url = "https://maps.google.com/maps/api/geocode/json?latlng=" . $latitude . ',' . $longitude . "&key=AIzaSyBz1jMjJPw1KIAoGbsESx0-4iMTDmLf7nw";

        $curl_return = SiteHelper::getLocation($url);

        $obj = json_decode($curl_return);

        $storeAddress = '';

        if (!empty($obj->results[0]->formatted_address)) {
            $storeAddress = $obj->results[0]->formatted_address;
        }

        return view('store/view', compact('model', 'storeAddress'));
    }

    public function storeLocation($id)
    {
        // $model = Store::with('storeBanners')->where(['id' => $id])->first();
        $model = Order::with('store')->where('id', $id)->first();
        dd($model->store->store_name);
        return view('store/location', compact('model'));
    }

    public function updateStatus(Request $request)
    {
        $storeId = $request->id;
        $model = Store::find(['id' => $storeId])->first();

        if ($model->visible_status == 0) :
            $updateData = [
                'visible_status' => 1,
            ];
        else :
            $updateData = [
                'visible_status' => 0,
            ];
        endif;

        Store::where('id', $request->id)->update($updateData);

        return redirect()->route('stores')->with('success', 'Visibility status updated successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Store $store
     */
    public function destroy(Store $store)
    {
        //
    }
}
