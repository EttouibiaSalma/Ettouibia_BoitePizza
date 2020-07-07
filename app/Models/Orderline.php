<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Orderline extends Model
{
    protected $table = 'orderline';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['OrderNum', 'ProductCode', 'price', 'nb'];
    // protected $hidden = [];
    // protected $dates = [];
}
