<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Vendor extends Model
{
    use HasFactory;

  protected $fillable =  ['name' , 'address', 'email' , 'password', 'logo' ,  'mobile' , 'active' , 'created_at' , 'updated_at'];



  public $timestamps =  true; 

  public function categories () {

    return $this->belongsToMany(Category::class, 'vendors_categories');
  } 


  public function locations () {

    return $this->hasMany(Location::class , 'vendor_id');
  } 


public function  getlogoAttribute($logo) {


$logo  =  Str::after($logo, 'assets');
$logo =  str_replace('\\' , '/'  , $logo);

return asset('assets'.$logo);



}








}
