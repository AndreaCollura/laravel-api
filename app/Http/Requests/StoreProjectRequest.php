<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => 'required|unique:projects|max:150|min:3',
            'git' => 'required|max:255',
            'date' => 'required',
            'type_id' => 'nullable|exists:types,id',
            'categories' => 'nullable|exists:categories,id'

        ];
    }


    /* public function messages(){
        return [
            'title.require' => 'the title is mandatory',
            'title.unique.projects' => 'another proj. have this title',
            'title.max' => 'title is too long',
            'title.min' => 'title is too short',

        ];
    } */
}
