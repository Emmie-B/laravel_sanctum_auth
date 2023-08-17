<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::all();

        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return Product::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        //
        return Product::find($id) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $product = Product::find($id);
        $product->update($request->all());
        return $product;
    }
    /**
     * Search for a specified resource in storage.
     */
    public function search(string $name)
    {
        //
        $product = Product::where('name', 'like', '%'.$name.'%')->get();
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = [];
       $destroy =  Product::destroy($id);

       if ($destroy) {
        $response['Status'] = "Destroyed";
        return json_encode($response);
        # code...
       }
        
    }
}
