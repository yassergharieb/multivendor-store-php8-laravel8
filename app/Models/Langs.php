<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lang extends Model
{
    use HasFactory;



 
 
    protected $fillable =  ['name' , 'direction' , 'abbr' , 'is_active' , 'local' 
    , 'created_at' , 'updated_at'];

    
    public function scopeSelect($query){
        return $query->select('name' , 'slug' , 'row_lang' , 'translation_of' , 'is_active');
    }

    
}
