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
        $newAmountSale = (double) 0;
        $newQuantItems = (integer) 0;
        // get actual sale
        $actualSale = SalesModel::with('products')->find($id);
        if(!$actualSale){
            return response([
                'message' => 'Sale not found'
            ], 400);
        }
        // get actual items
        $actualItems = $actualSale->products;
        // get ids
        $actualProductsIds = [];
        // get all items id
        foreach ($actualItems as $key => $product) {
                array_push($actualProductsIds, $product->id);
            }
        // delete old products
        SalesProductsModel::where(
            'sales_id', $id)
            ->delete();
        // --
        foreach ($request->products as $key => $product) {
                SalesProductsModel::create([
                    'sales_id' => $actualSale->id,
                    'products_id' => $product['product_id'],
                    'amount' => $product['amount']
                ]);
                $newAmountSale += ($product['price'] * $product['amount']);
                $newQuantItems += $product['amount'];
            }
        $actualSale->update([
            'amount'=> $newAmountSale,
            'items'=> $newQuantItems
        ]);
        return $actualSale->with('products')->get();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $actualSale = SalesModel::with('products')->find($id);
        foreach($actualSale->products as $key => $value){
                SalesProductsModel::where('sales_id', $id)->delete();
            }
        $actualSale->delete();
        return response(['message' => 'sale successfully deleted'], 200);
    }
}
