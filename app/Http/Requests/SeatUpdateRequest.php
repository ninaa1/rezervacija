<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeatUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'row' => 'required|integer|max:50',
            'number' => 'required|integer|max:300',
            'hall_id' => 'required|integer'
        ];
    }
}
