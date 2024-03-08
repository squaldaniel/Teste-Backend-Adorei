<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ProductsModel;

class SalesProductsModel extends Model
{
    use HasFactory;
    public $table = 'sales_products';

    public $fillable = [
        'sales_id',
        'products_id',
        'amount',
    ];
    protected $hidden = ['created_at', 'updated_at'];
    public function sales()
    {
        $this->belongsToMany(ProductsModel::class, 'products_id');
    }
}
