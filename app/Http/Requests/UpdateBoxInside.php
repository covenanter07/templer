<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBoxInside extends APIRequest // FormRequest 改成 APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // 把它改成true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'quantity' => 'required|integer|between:1,10',
        ];
    }
    public function message() // 建立個function
    {
        return [
            'quantity.between' => '數量必須小於10',
        ];
    }
}
