<?php

use App\BuyingTransaction;
use Illuminate\Database\Seeder;
use App\Wager;

class WagerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 50; $i += 1) {
            $wager = new Wager([
                'total_wager_value' => mt_rand(100, 999999),
                'odds' => mt_rand(1, 5),
                'selling_percentage' => mt_rand(0, 100),
            ]);
            $wager->selling_price = mt_rand(50, $wager->total_wager_value);
            $wager->save();

            $buyingTransaction = new BuyingTransaction([
                'wager_id' => $wager->id,
                'buying_price' => mt_rand(1, $wager->selling_price),
            ]);

            $buyingTransaction->save();
        }
    }
}
