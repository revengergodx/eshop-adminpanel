<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'required',
            'content' => 'required',
            'price' => 'required',
            'count' => 'required',
            'preview_image' => 'required',
            'category_id' => 'nullable',
            'tags' => 'nullable|array',
            'tags.*' => 'nullable|exists:tags,id',
            'colors' => 'nullable|array',
            'colors.*' => 'nullable|exists:colors,id',
            'sizes' => 'nullable|array',
            'sizes.*' => 'nullable|exists:sizes,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Необхідно заповнити це поле',
            'description.required' => 'Необхідно заповнити це поле',
            'content.required' => 'Необхідно заповнити це поле',
            'price.required' => 'Необхідно заповнити це поле',
            'count.required' => 'Необхідно заповнити це поле',
            'preview_image.required' => 'Необхідно додати зображення',
            ];
    }
}
