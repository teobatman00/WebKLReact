<?php

namespace App\Http\Category;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class UpdateCategoryFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5',
            'slugs' => 'required'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $error = (new ValidationException($validator))->errors();
        throw new HttpResponseException($this->badRequestResponse([
            'error' => $error
        ], "Validation Error"));
    }
}
