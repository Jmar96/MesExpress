<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParcelStatusListCreateRequest extends FormRequest
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
            //
            'item_status' => 'required|max:255',
            'item_status_description' => 'required|max:255',
            'item_status_group' => 'max:255',
            'item_status_group2' => 'max:255',
        ];
    }
    public function messages()
    {
        return [
            'item_status.max' => 'Status name should not be greater than 255 characters!',
            'item_status_description.max' => 'Description should not be greater than 255 characters!',
            'item_status_group.max' => 'Group should not be greater than 255 characters!',
            'item_status_group2.max' => 'Group should not be greater than 255 characters!',
        ];
    }
}
