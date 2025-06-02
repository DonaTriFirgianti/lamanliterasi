<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Transaction;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Basic Statistics
        $stats = [
            'total_items' => Item::count(),
            'total_categories' => Category::count(),
            'total_suppliers' => Supplier::count(),
            'total_transactions' => Transaction::count(),
        ];

        // Recent Activities
        $recent_items = Item::with(['category', 'supplier'])
            ->latest()
            ->take(5)
            ->get();

        $recent_transactions = Transaction::with(['item'])
            ->latest()
            ->take(10)
            ->get();

        // Chart Data: Transaction Statistics per Month (last 6 months)
        $months = [];
        $inTransactions = [];
        $outTransactions = [];

        $currentMonth = Carbon::now()->startOfMonth();
        for ($i = 5; $i >= 0; $i--) {
            $month = $currentMonth->copy()->subMonths($i);
            $months[] = $month->format('M');
            $inTransactions[] = Transaction::where('type', 'in')
                ->whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->count();
            $outTransactions[] = Transaction::where('type', 'out')
                ->whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->count();
        }

        $transactionData = [
            'labels' => $months,
            'in' => $inTransactions,
            'out' => $outTransactions
        ];

        return view('admin.dashboard', compact(
            'stats',
            'recent_items',
            'recent_transactions',
            'transactionData'
        ));
    }
}