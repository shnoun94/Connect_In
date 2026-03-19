<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     *
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'content' => strip_tags($this->content),
        ]);
    }
    public function rules(): array
    {

        return [

            'content' => 'required|string',
            'image_path' => 'nullable|string',
            //
        ];
    }
}
