<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesModel;
use App\Http\Requests\SalesRequest;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SalesModel::get();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(SalesRequest $request)
    {
        return $request->all();
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
