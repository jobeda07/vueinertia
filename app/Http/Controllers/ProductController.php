<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ImageUpload;
    public function index()
    {
        $products=Product::latest()->get();
        return Inertia::render('frontend/product/Index',[
            'products'=>$products
           ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

       return Inertia::render('frontend/product/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Product::create($request->validate([
        //     'name' => ['required', 'max:50'],
        //     'price' => ['required', 'max:50'],
        //   ]));
        $request->validate([
            'name' => ['required', 'max:50'],
            'price' => ['required', 'max:50'],
        ]);
        $product=Product::create([
            'name' =>$request->name,
            'price' =>$request->price,
          ]);
        if ($request->file('image')) {
            $filename = $this->imageUpload($request->image, 148, 177, 'uploads/Product/');
            $product->image ='uploads/Product/'. $filename;
            $product->save();
        }
        return to_route('products.index')->with('message','Product Create SuccessFully');
        //return to_route('products.index')->with('toast','Product Create SuccessFully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $productadd=Product::find($id);
        $product=[
           "name"=>$productadd->name,
           "price"=>$productadd->price,
           "image"=>$productadd->image? env('APP_URL') . '/' . $productadd->image : '',
        ];
        return Inertia::render('frontend/product/Show',[
            'product'=>$product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $productadd=Product::find($id);
        $product=[
           "id"=>$productadd->id,
           "name"=>$productadd->name,
           "price"=>$productadd->price,
           "image"=>$productadd->image? env('APP_URL') . '/' . $productadd->image : '',
        ];
        return Inertia::render('frontend/product/Edit',[
            'item'=>$product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'name' => ['required', 'max:50'],
        //     'price' => ['required', 'max:50'],
        // ]);
        $product=Product::find($id);
        $product->name =$request->name;
        $product->price =$request->price;
        if ($request->file('image')) {
            $this->deleteOne('uploads/Product/', $product->image);
            $filename = $this->imageUpload($request->image, 148, 177, 'uploads/Product/');
            $product->image ='uploads/Product/'. $filename;
        }
        $product->save();
        return to_route('products.index')->with('message','Product Update SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product=Product::find($id);
        $product->delete();
        return back()->with('message','Product Delete SuccessFully');
    }
}
