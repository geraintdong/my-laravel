<?php

namespace App\Http\Controllers\Api;

use App\BuyingTransaction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBuyWager;
use App\Http\Requests\StoreWager;
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

    public function store(StoreWager $request)
    {
        $wager = new Wager([
            'total_wager_value' => $request->get('total_wager_value'),
            'odds' => $request->get('odds'),
            'selling_percentage' => $request->get('selling_percentage'),
            'selling_price' => $request->get('selling_price'),
        ]);

        $wager->save();

        return \response()->json($wager);
    }
}
