<?php

namespace App\Http\Requests;

use App\Wager;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StoreBuyWager extends FormRequest
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
     * Validate buying wager
     *
     * @return array
     */
    public function rules()
    {
        $wager = Wager::find($this->route('wagerId'));
        if (!$wager) {
            throw (new NotFoundHttpException('Wager not found'));
        }

        $currentSellingPrice = $wager->current_selling_price;
        return [
            'buying_price' => "required|numeric|min:0|max:$currentSellingPrice",
        ];
    }
}
