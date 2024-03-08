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
        'amount',
        'items',
    ];
    protected $hidden = ['created_at', 'updated_at'];
    public function products ()
    {
        return $this->belongsToMany(
            ProductsModel::class,
            'sales_products',
            'sales_id',
            'products_id',
        )
        ->select([
            'products.id'
            , 'products.name'
            , 'products.price'
            , 'sales_products.amount']);
    }
}
