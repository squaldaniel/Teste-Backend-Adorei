<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductsModel;
use App\Http\Requests\ProductsRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProductsModel::get();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductsRequest $request)
    {
        $product = ProductsModel::create($request->all());
        return response([
            'message' => "product inserted successfully",
            'product_id' => $product->id
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return ProductsModel::find($id);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(ProductsRequest $request, string $id)
    {
        $request->validate([
            'product_id'=>'required|integer'
        ]);

        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
