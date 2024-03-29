<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\SalesProductsModel;

class ProductsModel extends Model
{
    use HasFactory;
    public $table = 'products';
    public $fillable = [
        'name',
        'price',
        'description',
    ];
    protected $hidden = ['created_at', 'updated_at'];
    public function toArray()
    {
        $attributes = $this->getAttributes();
        $attributes['product_id'] = $attributes['id'];
        unset($attributes['id']);

        return $attributes;
    }
    public function sales()
    {
        return $this->belongsTo(
                        SalesModel::class,
                        'products_id',
                        // 'id',
                        // 'id',   
                    );
    }
}
