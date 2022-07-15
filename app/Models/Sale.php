<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function getGetStatusTypeAttribute(){
        if ($this->status == "1") {
            return "Pendiente";
        }elseif ($this->status == "2") {
            return "Completada";
        } elseif ($this->status == "3") {
            return "Cancelada";
        }
    }

    public function getGetClientNameAttribute()
    {
        if ($this->client) {
            return $this->client->name . " " . $this->client->lastname;
        } else {
            return "Anonimo";
        }
    }

    public function getGetStatusClassAttribute()
    {
        if ($this->status == "1") {
            return "warning";
        }elseif ($this->status == "2") {
            return "success";
        } elseif ($this->status == "3") {
            return "danger";
        }
    }

    public function getGetTotalAttribute()
    {
        if ($this->total === null || $this->total === 0) {
            return "0";
        }

        return $this->total;
    }
}
