<?php

namespace App\Http\Controllers;

use App\Services\CrawService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        $crawService = new CrawService();
        $coins = $crawService->getCoin();

        return view('dashboard', ['coins' => $coins]);
    }

    public function send(): void
    {
        $date = new \DateTime();
        $date = Carbon::parse($date)->format('Y-m-d H:m');
        Log::stack(['single', 'slack'])->warning("$date");
        ddd($date);
    }
}
