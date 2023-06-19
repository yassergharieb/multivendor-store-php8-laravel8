<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LangsRequest;
use App\Models\Lang;
use Illuminate\Http\Request;

class LangsController extends Controller
{
    


    public function create(){
        return view('admin.SiteLangs.create');
    }


    public function index () {
        return view('admin.languages.index');
    }


    public function store (LangsRequest $request) {
     

       try {
        if(!$request->has('is_active')) {
            $request->request->add(['is_active' => 0]);
        }


     return   get_langs();
        //  $lang =  Langs::create();

       } catch(\Exception  $ex) {
    

       }
       

     
    }
}
