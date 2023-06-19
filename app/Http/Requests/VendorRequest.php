<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

use Illuminate\Validation\Rule;

class VendorRequest extends FormRequest
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
        return [
            'logo' => 'required_without:vendor_id', 
            'cat_ids' => 'array|min:2|required_without:vendor_id', 
            'cat_ids.*' => 'exists:categories,id', 
            'name' =>  'required_without:vendor_id|string|min:10', 
            'email' =>   'required_without:vendor_id|email|unique:vendors,email,'. $this->id, 
            'password' => ['required_without:vendor_id'  , Password::min(8)->letters()->symbols() ],
             'active' =>  Rule::unique('locations' , 'status')->where(function ($query) {
                        return $query->where('status' ,  1)->where('vendor_id' , $this->id);
              })
            




        ];
    }



    public function messages () {
        return [
            'cat_ids.required' => 'this is required',
            'cat_ids.*.exists' => 'One or more of the category IDs do not exist.',
            'cat_ids.min' => 'at least select 2  categories', 
            //  'name.required' => 'the name is requeired'

            ];
    }
}
