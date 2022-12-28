<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Factory extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'factories';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'factory_code';
    
    
    
}
