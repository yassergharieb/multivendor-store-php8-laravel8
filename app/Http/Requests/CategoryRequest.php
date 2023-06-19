<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $langs = get_langs();
       
       
    //    dd( $this->validateIputInIteration($langs));
    return   array_merge($this->validateIputInIteration($langs),  [
            'slug' => 'required_without:id|unique:categories,slug,'.$this->id, 
            'row_lang' =>  Rule::in($langs),            
            'photo' =>  'nullable',
            'active' =>  'required|in:0,1', 
            'parent_id' =>  'exists:categories,id|nullable', 
        ] );
    //     return [ 
    //          $this->validateIputInIteration($langs),  
    //         'slug' => 'required_without:id|unique:categories,slug,'.$this->id, 
    //         'row_lang' =>  Rule::in($langs),            
    //         'photo' =>  'nullable',
    //         'active' =>  'required|in:0,1', 
    //         'parent_id' =>  'exists:categories,id|nullable', 
    //     ];
    }



  



    protected  function validateIputInIteration($theIteratore) {
       $rules = [];
          foreach($theIteratore as $i) {
            $rules['category_name_'.$i ] =  'required|string|max:5';

        }

        return $rules;
    }



    // protected  function failedValidation(\Illuminate\Contracts\Validation\Validator $validator) {
     
    //       if ($validator->errors()) {
    //         // dd($validator->errors());
    //       }
    //  }
 


}
