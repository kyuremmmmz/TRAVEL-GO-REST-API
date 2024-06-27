<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourRequest extends FormRequest
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
        return  [
            "priceFrom"=> "numeric|required",
            'priceTo'=> 'numeric|required',
            'dateFrom'=>'numeric|required',
            'dateTo'=> 'numeric|required',
            'sortTo'=> 'price',
            'sortBy'=> 'asc', 'desc',
        ];
    }


    

    public function messages(): array
    {
        return [
            'sortBy'=> 'This Can be sort through price.',
            'sortTo'=> 'This can be sort through asc and desc'
        ];
    }
}
