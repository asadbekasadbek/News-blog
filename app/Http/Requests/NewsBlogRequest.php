<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsBlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id' =>'required|integer',
            "tags"=>'required|array',
            'title'=>'required|min:2',
            'image'=>'required|mimes:jpeg,png,jpg,gif',
            'description'=>'required',
        ];
    }
}
