<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:movies,title|min:2|max:100',
            'thumb' => 'nullable',
            'description' => 'nullable',   
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Il titolo è un campo obbligatorio',
            'title.min' => 'Il titolo è troppo corto, seleziona un titolo più adatto',
            'title.max' => 'Il titolo è troppo lungo, seleziona un titolo più adatto',
            'title.unique' => 'Il titolo scelto è già esistente',
        ];
    }
}
