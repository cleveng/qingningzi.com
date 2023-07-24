<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // middleware done
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
            'title' => 'required|string',
            'shortcode' => 'required|string',
            'content' => 'required|string',
            'author' => 'required|string',
            'category_id' => 'required|integer',
            'platform.name' => 'required|string',
        ];
    }
}
