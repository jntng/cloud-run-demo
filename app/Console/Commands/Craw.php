<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;

class Craw extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'craw:btc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
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
        foreach ($priceData as $data) {
            //Storage::disk('local')
            //    ->append("$now.txt", $data);
        }

        return 0;
    }
}
