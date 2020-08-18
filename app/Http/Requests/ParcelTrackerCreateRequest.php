<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParcelTrackerCreateRequest extends FormRequest
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
            'item_name' => 'required|max:255',
            'item_reference_number' => 'required|max:255',
            'item_price' => 'required|numeric',
            'item_weight' => 'required|numeric',
            'item_consignee_fullname' => 'required|max:255',
            'item_consignee_contactno' => 'required|max:255',
            'item_consignee_address' => 'required|max:255',
            'item_sender_fullname' => 'required|max:255',
            'item_sender_contactno' => 'required|max:255',
            'item_sender_address' => 'required|max:255',
        ];
    }
    public function messages()
    {
        return [
            'title.max' => 'Package name should not be greater than 255 characters!',
            'item_reference_number.max' => 'Reference number should not be greater than 255 characters!',
            'item_price.numeric' => 'Price should be numeric!',
            'item_weight.numeric' => 'Weight should be numeric!',
            'item_consignee_fullname.max' => 'Should not be greater than 255 characters!',
            'item_consignee_contactno.max' => 'Should not be greater than 255 characters!',
            'item_consignee_address.max' => 'Should not be greater than 255 characters!',
            'item_sender_fullname.max' => 'Should not be greater than 255 characters!',
            'item_sender_contactno.max' => 'Should not be greater than 255 characters!',
            'item_sender_address.max' => 'Should not be greater than 255 characters!',
        ];
    }
}
