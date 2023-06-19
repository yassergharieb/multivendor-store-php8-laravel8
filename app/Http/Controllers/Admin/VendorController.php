<?php

namespace App\Http\Controllers\Admin;

use App\Events\VendorCreation;
use App\Http\Controllers\Controller;
use App\Http\Requests\VendorRequest;
use App\Models\Category;
use App\Models\Location;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VendorController extends Controller
{


  public function index()
  {


    $vendors =  Vendor::get();


    return view('admin.vendors.index', compact('vendors'))
    
    
    
    ;
  }


  public function create()
  {
    $categories =  Category::where('row_lang', app()->getLocale())->get();

    return view('admin.vendors.create', compact('categories'));
  }



  public function store(Request $request)
  {

    try {

      !$request->active ? $request->request->add(['acitve' =>  0]) :  $request->active;

      DB::beginTransaction();

      $image_path =   $image_path =  SavePhoto($request->logo, 'products');

      $vendor =  Vendor::create([
        'name' =>  $request->name,
        'password' => bcrypt($request->password),
        'email' => $request->email,
        'address' =>  $request->address,
        'logo' =>   $image_path,
        'mobile' =>  $request->mobile,
        'active' =>  $request->active
      ]);

      $vendor->categories()->attach($request->cat_ids);

      if ($vendor && isset($request->longitude) &&  isset($request->latitude)) {
        Location::create([
          'vendor_id' =>  $vendor->id,
          'longitude' =>  $request->longitude,
          'latitude' =>  $request->latitude,

          'address' =>  $request->address,
        ]);
      }
      event(new  VendorCreation($vendor));
      DB::commit();

      return redirect()->route('vendor.index')->with(['success' =>  'vendor account has been created successfully ']);
    } catch (\Exception  $ex) {
      DB::rollback();
      return redirect()->back()->with(['error' =>  'there is error , try again ']);
    }
  }



  public function edit($id)
  {
    $vendor = Vendor::with(['locations' =>  function ($query) {

      return $query->where('status', 1)->select('vendor_id', 'longitude', 'latitude')->get();
    }])->find($id);
    $categories =  Category::where('row_lang', app()->getLocale())->get();

    if (!$vendor) {

      return redirect()->back()->with(['error' => 'Vendor not found']);
    }
    // If the vendor is found, return the edit view with the vendor data
    return view('admin.vendors.edit', compact(['vendor', 'categories']));
  }


  public function update($id, Request  $request)
  {



    try {
      DB::beginTransaction();
      $vendor  =  Vendor::find($id);
      !$request->active ? $request->request->add(['acitve' =>  0]) :  $request->active;
      if ($vendor) {

        if ($request->has('passowrd')) {
          $vendor->update(['paaword' =>   bcrypt($request->password)]);
        }

        if ($request->has('logo')) {

          $image =  Str::after($vendor->logo, 'assets/');
          if (file_exists('assets/' . $image)) {
            unlink('assets/' . $image);
            $image_path =  SavePhoto($request->logo, 'vendors');
            $vendor->update(['logo' =>  $image_path]);
          } else {
            $image_path =  SavePhoto($request->logo, 'vendors');
            $vendor->update(['logo' =>  $image_path]);
          }
        }
      }



      $vendor->update(
        $request->except('id',  '_token', 'password', 'cat_ids',  'longitude', 'latitude', 'logo')
      );
      $vendor->categories()->sync($request->cats_ids);

      if ($vendor && isset($request->longitude) &&  isset($request->latitude)) {
        $location =  Location::where('vendor_id', $vendor->id)->where('status', 1);
        $location->update([
          'vendor_id' =>  $vendor->id,
          'longitude' =>   $request->longitude,
          'latitude' =>  $request->latitude,
          'address' =>  $request->address,
        ]);
      }
      // event(new  VendorCreation($vendor));
      DB::commit();

      return redirect()->route('vendor.index')->with(['success' =>  'vendor account has been created successfully ']);
    } catch (\Exception  $ex) {
      DB::rollback();
      return redirect()->back()->with(['error' =>  'there is error , try again ']);
    }
  }



  public function changeStatus($id)
  {

    $vendor = Vendor::find($id);
    if (!$vendor) {

      return redirect()->back()->with(['error' => 'Vendor not found']);
    }

    $vendor->active =  !$vendor->active;

    $vendor->save();
    return redirect()->back()->with(['success' => 'vendor status changes']);
  }
}
