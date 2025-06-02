<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Category;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_items' => Item::count(),
            'total_categories' => Category::count(),
            'new_items' => Item::where('created_at', '>=', Carbon::now()->subDays(7))->count(),
        ];

        $recent_items = Item::with(['category'])->latest()->take(6)->get();

        return view('user.dashboard', compact('stats', 'recent_items'));
    }
}