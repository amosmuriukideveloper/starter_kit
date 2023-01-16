<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class TendersController extends Controller
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
      
       
        return view('tendor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('auth.products.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:products,name',
            'permission' => 'required',
        ]);

        $products = Products::create(['name' => $request->get('name')]);
        $products->syncPermissions($request->get('permission'));

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
        $productsPermissions = $products->permissions;

        return view('auth.products.show', compact('product', 'productsPermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        $products = $products;
        $productsPermissions = $products->permissions->pluck('name')->toArray();
        $permissions = Permission::get();

        return view('auth.rproducts.edit', compact('products', 'productsPermissions', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Products $products, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $products->update($request->only('name'));

        $products->syncPermissions($request->get('permission'));

        return redirect()->route('products.index')
                        ->with('success','Products updated successfully');
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
