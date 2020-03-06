<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class BuyingTransaction extends Model
{
    protected $table = 'buying_transaction';

    protected $visible = [
        'id',
        'wager_id',
        'buying_price',
    ];

    protected $appends = [
        'bought_at',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function getBoughtAtAttribute()
    {
        return (new Carbon($this->created_at))->format(Carbon::ATOM);
    }
}
