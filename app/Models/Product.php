<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
     protected $primaryKey = 'product_code';
    protected $fillable = [
        'product_code',
        'product_name',
        'product_line',
        'status',
        'factory_code',
        'store_code',
        'warranty_center_code',
    ];

    
/*
    public function factory()
    {
        return $this->belongsTo('App\Models\Factory');
    }

    public function store()
    {
        return $this->belongsTo('App\Models\Store');
    }

    public function warranty_center()
    {
        return $this->belongsTo('App\Models\Warranty_Center');
    }*/
}
