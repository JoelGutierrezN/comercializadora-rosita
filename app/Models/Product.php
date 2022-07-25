<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Milon\Barcode\DNS1D;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'code',
        'description',
        'provider_id',
        'price',
        'provider_price',
        'stock',
        'photo',
        'status',
        'user_id'
    ];

    protected $attributes = [
        'stock' => 1,
        'status' => 1,
        'photo' => null
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getGetDescriptionAttribute()
    {
        return substr($this->description, 0, 65);
    }

    public function getGetPhotoAttribute()
    {
        if ($this->photo) {
            // return url("public/storage/$this->photo"); //production
            return url("storage/$this->photo"); //production
        }else{
            return asset('img/product/product.png');
        }
    }

    public function getBarCodeAttribute()
    {
        return DNS1D::getBarcodeHTML($this->code, 'C128A');
    }
}
