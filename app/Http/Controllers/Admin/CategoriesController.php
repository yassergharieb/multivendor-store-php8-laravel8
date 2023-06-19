<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Categories;
use App\Models\Category;
use App\Models\Langs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{

    public function index()
    {

        $categories =  Category::where('row_lang', app()->getLocale())->get();
        return view('admin.categories.index', compact('categories'));
    }


    public function create()
    {

        $main_categories =  Category::mainCategory()->where('row_lang', app()->getLocale())->select('id', 'name')->get();

        return view('admin.categories.create', compact('main_categories'));
    }


    public function store(Request $request)
    {
       

          $allLangs  = array_flip(get_langs());

        try {
            DB::beginTransaction();
            $default_lang = config('app.locale');
            $langs_except_default_lang = collect($allLangs)->except([$default_lang]);
          
            $first_categoy =  Category::create([
                'name'       => $request->input('category_name_' . $default_lang),
                'slug' => $request->input('slug_' . $default_lang),
                'row_lang' => $default_lang,
                'photo' =>  '',
                'active' => $request->has('active_' . $default_lang) ? '1' : '0',
                'parent_id' => $request->has('parent_id') ?  $request->has('parent_id') : null


            ]);


            foreach ($langs_except_default_lang as $key => $value) {
                 

                // dd($key);
                Category::create([
                    'name' => $request->input('category_name_' . $key),
                    'slug' => $request->input('slug_' . $key),
                    'row_lang' => $key,
                    'photo' =>  '',
                    'translation_of' =>   $first_categoy->id,
                    'active' => $request->has('active_' . $key) ? '1' : '0',
                    'parent_id' => $request->has('parent_id') ?  $request->has('parent_id') : null
                ]);
            }

            DB::commit();
            return redirect()->back()->with(['success' => 'category created succesfully with its translations']);
        } catch (\Exception $ex) {


        DB::rollBack();    
        return redirect()->back()->with(['error' => 'some thing went wrong!']);
        }
    }


    public function show($id)
    {
    }


    public function edit($id)
    {
    }


    public function update(Request $request, $id)
    {
    }


    public function destroy($id)
    {
        $category =  Category::whereDoesntHave('vendors')->find($id)->softDeletes();
    }



    public function changeStatus($id)
    {
        $category =  category::find($id);
        if (!$category) {
            return redirect()->back()->with(['error' =>  'some thing went wrong']);
        }


        $category->active =  !$category->active;
        $category->save();

        return redirect()->back()->with(['success' => 'category  status  has updated']);
    }
}
