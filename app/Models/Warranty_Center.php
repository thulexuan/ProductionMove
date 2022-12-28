<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warranty_Center extends Model
{
    use HasFactory;
    protected $table = 'warranty_centers';
    protected $primaryKey = 'warranty_center_code';
    public $incrementing = false;
    protected $keyType = 'string';

    public function account() {
        return $this->hasOne('App\Models\User');
    }

    public function products() {
        return $this->hasMany('App\Models\Products');
    }
}
