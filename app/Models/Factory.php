<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factory extends Model
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $table = 'factories';
    
    protected $fillable = [
        'factory_code',
        'factory_name',
        'address',
    ];

    public function account() {
        return $this->hasOne('App\Models\User');
    }

    public function products() {
        return $this->hasMany('App\Models\Products');
    }
}
