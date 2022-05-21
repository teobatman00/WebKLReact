<?php

namespace App\Http\Requests\Post;

use App\Traits\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class PostCreateFormRequest extends FormRequest
{
    use ApiResponse;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:5',
            'excerpt' => 'required|min:5',
            'content' => 'required|min:5',
            'slug' => 'required',
            'imageUrl' => 'required',
            'published' => 'required',
            'categoryId' => 'required'
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
