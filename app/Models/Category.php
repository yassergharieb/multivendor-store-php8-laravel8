<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Observers\CategoryObserver;
class Category extends Model
{
    use HasFactory;


 

    protected $fillable =  ['name',  'translation_of', 'parent_id' ,  'slug','row_lang','photo', 'active' ,  'created_at' , 'updated_at'];

    public function getActive () {
        return $this->active  == '1' ? __('CustomDisplays.active') :   __('CustomDisplays.inactive');
    }


    public function scopeSelection($query){
        return $query->select('name' , 'slug' , 'row_lang' , 'translation_of' , 'is_active');
    }



    public function vendors() {
        return $this->belongsToMany(Vendor::class , 'vendors_categories');
    } 
    protected static function boot() {
        parent::boot();
        Category::observe(CategoryObserver::class);
    }

  

    public function childern(){
        return $this->hasMany(Category::class , 'parent_id');
    }





    public function scopeSubCategory($query) {
         return $query->whereHas('parent_id');
    }
    public function scopeMainCategory($query) {
        return $query->where('parent_id' , 0);
        // $query->WhereDoesntHave('childern' , function($q) {
        //     return $q->where('row_lang' , app()->getLocale());
        // });
   }



   public function updateEveryVendorStatus($category) {

       $vendors =  $this->vendors();

      
       $vendors->each(
        function($vendor) use ($category) {
        $vendor->update(['active' =>  $category->active]);
        }
       );

   } 



    
}
