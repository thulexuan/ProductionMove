<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $table = 'stores';
    

    public function account() {
        return $this->hasOne('App\Models\User');
    }

    public function products() {
        return $this->hasMany('App\Models\Products');
    }
}
