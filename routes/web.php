<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Symfony\Component\DomCrawler\Crawler;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $response = Http::get('https://crypto.cnyes.com/BTC/24h');
    $outputString = $response->body();

    $crawler = new Crawler($outputString);
    $priceData = $crawler
        ->filter('.item-value')
        ->each( function (Crawler $node) {
            return $node->text();
        });
    $now = Carbon::now()->isoFormat("YYYY_MM_DD_HH_mm_ss");

    return $priceData;

//    return view('welcome');
});
