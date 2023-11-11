<?php

namespace Database\Seeders;

use App\Models\Coin;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class CoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::get('https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=100&page=1&sparkline=false&locale=en');

        if ($response->successful()) {
            $cryptocurrencies = $response->json();

            foreach ($cryptocurrencies as $crypto) {
                $coinData = $crypto;
                $coinData["crypto_id"] = $crypto["id"];
                unset($coinData["id"]);
                $coinData['ath_date'] = Carbon::parse($coinData['ath_date'])->toDateTimeString();
                $coinData['atl_date'] = Carbon::parse($coinData['atl_date'])->toDateTimeString();
                $coinData['last_updated'] = Carbon::parse($coinData['last_updated'])->toDateTimeString();

                $coinData['roi'] = !empty($coinData['roi']) ? json_encode($coinData['roi']) : $coinData['roi'];
                var_dump($coinData);
                Coin::create($coinData);
            }
        }
    }
}
