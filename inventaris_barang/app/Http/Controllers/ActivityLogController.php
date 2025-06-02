<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index()
    {
        // Ambil 20 aktivitas terbaru dengan relasi causer dan subject
        $activities = ActivityLog::with(['causer', 'subject'])
            ->latest()
            ->take(20)
            ->get();

        return view('activity-log.index', compact('activities'));
    }
}