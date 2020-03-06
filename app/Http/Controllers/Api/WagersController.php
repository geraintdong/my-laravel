<?php

namespace App\Http\Controllers\Api;

use App\BuyingTransaction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBuyWager;
use App\Wager;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WagersController extends Controller
{
    /**
     * Wagers List
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        return response()->json(
            Wager::paginate(
                $request->get('limit', 5)
            )
        );
    }

    /**
     * Buy a wager
     *
     * @param  StoreBuyWager  $request
     * @param  int  $wagerId
     * @return Response
     */
    public function buy(StoreBuyWager $request, int $wagerId)
    {
        $buyingTransaction = new BuyingTransaction([
            'wager_id' => $wagerId,
            'buying_price' => $request->get('buying_price'),
        ]);

        $buyingTransaction->save();

        return response()->json($buyingTransaction);
    }
}
