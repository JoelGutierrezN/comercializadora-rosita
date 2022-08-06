<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'contact',
        'phone',
        'address',
        'status'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function entries(){
        return $this->hasMany( Entry::class );
    }

    public function getGetClassAttribute(){
        if($this->status){
            return 'provider-active';
        }else{
            return 'provider-inactive';
        }
    }
}
