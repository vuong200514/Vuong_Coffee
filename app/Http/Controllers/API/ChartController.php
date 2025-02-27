<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class ChartController extends Controller
{
    public function salesChart()
    {
        $now = Carbon::now();
        $one_week_ago = Carbon::now()->subDays(6);

        $orders = Order::whereBetween('created_at', [$one_week_ago->startOfDay(), $now->endOfDay()])
            ->selectRaw('DATE(created_at) as date, SUM(total_price) as total_price')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $salesData = [];
        $currentDate = $one_week_ago->copy();
        while ($currentDate <= $now) {
            $formattedDate = $currentDate->format('Y-m-d');
            $salesData[$formattedDate] = 0;
            $currentDate->addDay();
        }

        foreach ($orders as $order) {
            $salesData[$order->date] = (int) $order->total_price;
        }

        return response()->json([
            'one_week_ago' => $one_week_ago->format('Y-m-d'),
            'now' => $now->format('Y-m-d'),
            'data' => $salesData
        ]);
    }
}
