<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\ModelType;
use App\Models\Products;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    public function __construct()
    {
        View::share('header','Products');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Products::with('brand','model_type')->get();
           
        return view('products.index',compact('products'));
    }
           

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $models = ModelType::all();
        $brands = Brand::all();
        return view('products.create', compact('models','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        // dd($request->all());
        $request->validated();
        $image = '';
        if ($request->has('image')) {
                $path = 'uploads/products/';
                $request->file('image')->move($path, $request->file('image')->getClientOriginalName());
                $image = $request->file('image')->getClientOriginalName();
           
        }

        $products = Products::updateOrCreate([
            'product_name' => $request->product_name,
            'product_type_id' => $request->product_type_id,
            'manufacturer' => $request->manufacturer,
            'price' => $request->price,
            'model_id' => $request->model_id,
            'brand_id' => $request->brand_id,
            'description' => $request->description,
            'image' => $image
        ]);
        

        return redirect()->route('products.index')
                        ->with('success','Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        $products = $products;
        

        return view('products.show', compact('product', 'productsPermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $models = ModelType::all();
        $brands = Brand::all();
        $product = Products::where('id','=',$id)->firstOrFail();
        return view('products.edit', compact('product','models','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        
       $validated = $request->validated();
       $product =  Products::where('id','=',$id)->firstOrFail();
     
       $image = '';
       if ($request->has('image')) {
               $path = 'uploads/products/';
               $request->file('image')->move($path, $request->file('image')->getClientOriginalName());
               $image = $request->file('image')->getClientOriginalName();
          
       }
      $data = [
        'product_name' => $request->product_name,
        'product_type_id' => $request->product_type_id,
        'manufacturer' => $request->manufacturer,
        'price' => $request->price,
        'model_id' => $request->model_id,
        'brand_id' => $request->brand_id,
        'description' => $request->description,
        'image' => $image
      ];

      $product->update($data);
       return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        $products->delete();

        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}
