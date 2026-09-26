<?php

namespace App\Http\Controllers;

use App\Models\Purchase;

class DashboardController extends Controller
{
    public function index()
    {
        $todayPurchases = Purchase::whereDate('purchase_date', today())->count();

        $todayPurchaseAmount = Purchase::whereDate('purchase_date', today())
            ->sum('grand_total');

        $recentPurchases = Purchase::with('supplier')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'todayPurchases',
            'todayPurchaseAmount',
            'recentPurchases'
        ));
    }
}