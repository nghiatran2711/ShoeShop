<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            //
            'name'=>'required',
            'description'=>'required|min:10',
            'thumbnail'=>'required|image',
            'status'=>'required',
            'is_feature'=>'required',
            'brand_id'=>'required',
            'category_id'=>'required',
        ];
    }
    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'description.required'=>'Description is required!',
            'description.min'=>'Description must have at least 10 characters',
            'thumbnail.required'=>'Thumbnail is required!',
            'thumbnail.image' => 'The type of the uploaded file should be an image.',
            'status.required'=>'Status is required!',
            'is_feature.required'=>'Feature is required!',
            'brand_id.required'=>'Brand id is required',
            'category_id.required'=>'Category id is required!'
        ];
    }
}
