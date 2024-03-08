<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesModel;
use App\Http\Requests\SalesRequest;
use App\Models\SalesProductsModel;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SalesModel::with('products')->get();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(SalesRequest $request)
    {
        $amount = (double) 0;
        $product_ids = [];
        $quant = [];
        foreach($request->products as $key => $value){
            array_push($product_ids, [$value['product_id']=>$value['amount']]);
            array_push($quant, $value['amount']);
            $amount += ($value['price'] * $value['amount']);
        }
        $totalItems = array_sum($quant);
        $sale = SalesModel::create([
            'amount'=> $amount,
            'items'=> $totalItems
        ]);
        foreach ($product_ids as $product) {
            foreach($product as $key => $quant ){
                $productsInSale = SalesProductsModel::create([
                    'sales_id' => $sale->id,
                    'products_id' => $key,
                    'amount' => $quant
                ]);
            }
        }  
        return SalesModel::where('id', $sale->id)
                        ->with('products')
                        ->get();
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return SalesModel::where('id', $id)
                ->with('products')->get();
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
