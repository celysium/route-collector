<?php

namespace Celysium\RouteCollector\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoutesRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'except' => ['required', 'sometimes', 'array', 'required_without:only'],
            'only'   => ['required', 'sometimes', 'array', 'required_without:except']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
