<?php

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

 function getFolder (){
   return app()->getLocale() ==  'ar' ? 'css-rtl' : 'css';
}


function uploadPhoto($folder , $image) {
try {
      $image->store('/', $folder);    
      $fileNmae =  $image->hashName();
      $path =  'assets/images/' . $folder .  '/' . $fileNmae;
      return $path;
  } catch (\Exception $ex) {
    return $ex->getMessage();
  }   

}



function SavePhoto($photo , $folder) {
    $file_extension =  $photo->getClientOriginalExtension();
    $file_name =  time().'.' . $file_extension;
    $path =  public_path('assets/images/'.$folder);
  
    $photo-> move($path ,  $file_name);
    return $path.'/'.$file_name;
}



function get_langs() {
  
   return array_keys(LaravelLocalization::getSupportedLocales());

}