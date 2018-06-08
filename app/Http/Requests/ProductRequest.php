<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'sltParent'=>'required' ,
            'txtName'=>'required|unique:products,name',
            'fImages'=>'required'

        ];
    }

    public function messages(){
        return[
            'sltParent.required'=>'Please choose Parent catagory',
            'txtName.required' =>'Please Enter Name Product',
            'txtName.unique' =>'This Name product is Exist',
            'fImages.required' =>'Please choose image'
        ];
    }
}
