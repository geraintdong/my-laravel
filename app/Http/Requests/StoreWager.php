<?php

namespace App\Http\Requests;

use App\Wager;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StoreWager extends FormRequest
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
     * Validate wager
     *
     * @return array
     */
    public function rules()
    {
        return [
            'total_wager_value' => "required|numeric|min:0|max:9999999999.99",
            'odds' => "required|numeric|min:0|max:9999999999.99",
            'selling_percentage' => "required|numeric|min:0|max:100",
            'selling_price' => "required|numeric|min:0|max:9999999999.99",
        ];
    }
}
