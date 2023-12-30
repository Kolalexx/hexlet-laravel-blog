<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class StorePostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->getMethod() === 'PATCH' || $this->getMethod() === 'PUT') {
            $nameRules = 'required|unique:articles,name,' . $this->article->id;
        } else {
            $nameRules = 'required|unique:articles';
        }
        return [
            'name' => $nameRules,
            'body' => 'required|min:100',
        ];
    }
}
