<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ProductsModel;
// use App\Models\SalesProductsModel;

class SalesModel extends Model
{
    use HasFactory;
    public $table = 'sales';
    public $fillable = [
        'sales_id',
        'amount',
    ];
    // public function products ()
    // {
    //     return $this->belongsToMany(
    //         ProductsModel::class,
    //         'sales_products',
    //         'sales_id',
    //         'id',
    //         'id',
    //         'products'
    //     );
    // }
    public function products ()
    {
        return $this->belongsToMany(
            ProductsModel::class,
            'sales_products',
            'sales_id',
            'products_id'
        );
    }
}
