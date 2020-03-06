<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Wager extends Model
{
    protected $table = 'wager';

    protected $casts = [
        'total_wager_value' => 'float',
        'odds' => 'float',
        'selling_price' => 'float',
        'selling_percentage' => 'float',
        'current_selling_price' => 'float',
        'amount_sold' => 'float',
    ];

    protected $visible = [
        'id',
        'total_wager_value',
        'odds',
        'selling_percentage',
        'selling_price',
        'placed_at',
        'current_selling_price',
        'percentage_sold',
        'amount_sold',
    ];

    protected $appends = [
        'placed_at',
        'current_selling_price',
        'percentage_sold',
        'amount_sold',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function getPlacedAtAttribute(): string
    {
        return (new Carbon($this->created_at))->format(Carbon::ATOM);
    }

    public function buyingTransactions(): HasMany
    {
        return $this->hasMany(BuyingTransaction::class);
    }

    public function getCurrentSellingPriceAttribute(): float
    {
        return (float) $this->selling_price - (float) $this->buyingTransactions->sum('buying_price');
    }

    public function getPercentageSoldAttribute(): ?float
    {
        $percent = (float) $this->buyingTransactions->sum('buying_price') / (float) $this->selling_price * 100;
        return $percent > 0 ? $percent : null;
    }

    public function getAmountSoldAttribute(): ?float
    {
        $percent = (float) $this->buyingTransactions->sum('buying_price');
        return $percent > 0 ? $percent : null;
    }
}
