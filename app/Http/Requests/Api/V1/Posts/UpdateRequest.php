<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\V1\Posts;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize() : bool
    {
        return true;
    }

    public function rules() : array
    {
        return [
            'title' => [
                'nullable',
                'string',
                'max:255',
                $this->get('key')
            ],
            'body' => [
                'nullable',
                'string'
            ],
            'description' => [
                'nullable',
                'string',  
                'max:120',
            ],
            'published' => [
                'nullable',
                'boolean'
            ]
        ];
    }
}
