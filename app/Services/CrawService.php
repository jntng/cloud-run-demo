<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Symfony\Component\DomCrawler\Crawler;

class CrawService
{
    public function getCoin()
    {
        $response = Http::get('https://crypto.cnyes.com/BTC/24h');
        $outputString = $response->body();

        $crawler = new Crawler($outputString);
        $priceData = $crawler
            ->filter('.item-value')
            ->each( function (Crawler $node) {
                return $node->text();
            });
        $now = Carbon::now()->isoFormat("YYYY_MM_DD_HH_mm_ss");

        $bitcoin = new \App\Models\Bitcoin();
        $bitcoin->coin_name = 'BitCoin';
        $bitcoin->celling_price_24H = $priceData[0];
        $bitcoin->best_price_24H = $priceData[1];
        $bitcoin->volume = $priceData[2];
        $bitcoin->time = $now;
        $bitcoin->save();

        Log::info($bitcoin);


        return \App\Models\Bitcoin::get()->toArray();
    }
}
