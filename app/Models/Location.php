<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable  =  [ 'longitude' , 'latitude' , 'vendor_id' , 
     'created_at' , 'updated_at' , 
     'status' , 'address' , 'branch_type' ];



     public $timestamps =  true;


     public function vendors() {
        return $this->belongsTo(Vendor::class , 'vendor_id');
     }
}
