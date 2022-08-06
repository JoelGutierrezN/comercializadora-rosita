<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = [
        'entry',
        'pcs',
        'provider_id',
        'product_id'
    ];

    protected $attributes = [
        'entry' => 1,
        'pcs' => 1
    ];

    public function provider(){
        return $this->belongsTo( Provider::class );
    }

    public function product(){
        return $this->belongsTo( Product::class );
    }
}
