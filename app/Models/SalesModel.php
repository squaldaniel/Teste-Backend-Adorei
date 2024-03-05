<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ProductsModel;

class SalesModel extends Model
{
    use HasFactory;
    public $table = 'sales';
    public $fillable = [
        'sales_id',
        'amount',
    ];
    public function products ()
    {
        return $this->hasMany(ProductsModel::class);
    }
}
