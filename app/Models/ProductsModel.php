<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    use HasFactory;
    public $table = 'products';
    public $fillable = [
        'name',
        'price',
        'description',
    ];
    public function toArray()
    {
        $attributes = $this->getAttributes();
        $attributes['product_id'] = $attributes['id'];
        unset($attributes['id']);

        return $attributes;
    }
}
