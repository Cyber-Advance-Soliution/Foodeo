<?php

namespace App\Http\Controllers;

use App\Helpers\SiteHelper;
use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Store;
use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Session;

class ProductCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $createdBy = Auth::user()->id;

        $model = ProductCategory::where(['created_by' => $createdBy])->get();

        return view('category/index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $createdBy = Auth::user()->id;
        $stores = Store::where(['created_by' => $createdBy, 'status' => 1, 'visible_status' => 1])->get();

        return view('category/create', compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */

    public function store(CategoryRequest $request)
    {
        $validatedData = $request->validated();

        $user = Auth::user();
        $createdBy = $user->id;
        if (auth()->user()->can('create-category') && $user->role == 2) {
            $userId = $user->userDetail->created_by;
            $parentEmployee = User::where('id', $userId)->first();
            $createdBy = $parentEmployee->userDetail->created_by;
        }

        $allowedExtensions = ['pdf', 'jpg', 'png', 'jpeg'];

        if ($request->has('category_icon')) {
            $image = $request->file('category_icon');
            $input['imagename'] = SiteHelper::generateRandomString() . '.' . $image->getClientOriginalExtension();

            // $destinationPath = public_path('/uploads/category_icons');
            $destinationPath = 'assets/uploads/category_icons';
            if (!file_exists('assets/uploads/category_icons')) {
                mkdir('assets/uploads/category_icons', 0777, true);
            }
            $img = Image::make($image->getRealPath());
            $img->resize(240, 240)->save($destinationPath . '/' . $input['imagename']);

            $iconPath = 'assets/uploads/category_icons/' . $input['imagename'];
        }

        $category = [
            'category_name' => $request['category_name'],
            'created_by' => $createdBy,
            'store_id' => $request['store_id'],
            'category_icon' => $iconPath,
        ];

        $categoryId = ProductCategory::create($category)->id;

        Session::flash('success', 'New Product Category created successfully');

        return redirect('new-category');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ProductCategory $productCategory
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ProductCategory $productCategory
     */
    public function edit(Request $request)
    {
        $createdBy = Auth::user()->id;

        $model = ProductCategory::find(['id' => $request->id]);
        $stores = Store::where(['created_by' => $createdBy, 'status' => 1, 'visible_status' => 1])->get();

        return view('category.edit', compact('model', 'stores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ProductCategory $productCategory
     */
    public function update(Request $request)
    {
        $categoryId = $request->category_id;
        $model = ProductCategory::where('id', $categoryId)->first();
        $user = Auth::user();
        $createdBy = $user->id;

        if (auth()->user()->can('categories') && $user->role == 2) {
            $userId = $user->userDetail->created_by;
            $parentEmployee = User::where('id', $userId)->first();
            $createdBy = $parentEmployee->userDetail->created_by;
        }

        if ($request->has('category_icon')) {

            $image_path = $model->category_icon;

            if (file_exists($image_path)) {
                File::delete($image_path);
            }

            $image = $request->file('category_icon');
            $input['imagename'] = SiteHelper::generateRandomString() . '.' . $image->getClientOriginalExtension();

            // $destinationPath = public_path('/uploads/category_icons');
            $destinationPath = 'assets/uploads/category_icons';
            if (!file_exists('assets/uploads/category_icons')) {
                mkdir('assets/uploads/category_icons', 0777, true);
            }
            $img = Image::make($image->getRealPath());
            $img->resize(240, 240)->save($destinationPath . '/' . $input['imagename']);

            $iconPath = 'assets/uploads/category_icons/' . $input['imagename'];


        } else {
            $updateData = [
                'category_name' => $request->category_name,
                'store_id' => $request->store_id,
                'created_by' => $createdBy,
            ];
            ProductCategory::where('id', $categoryId)->update($updateData);

            return redirect('categories');
        }


    }


    public function destroy(ProductCategory $productCategory)
    {
        //
    }

    public function storeCategories(Request $request)
    {
        $storeId = $request->store_id;

        $storeProductCategories = ProductCategory::where(['store_id' => $storeId])->get();

        $html = '<option selected="selected"> -- Select Product Category -- </option>';
        foreach ($storeProductCategories as $storeCategory) {
            $html .= '<option value="' . $storeCategory->id . '">' . $storeCategory->category_name . '</option>';
        }

        echo $html;
    }
}
