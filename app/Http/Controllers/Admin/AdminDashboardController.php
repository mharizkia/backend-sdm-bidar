<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()->notifications->sortByDesc('created_at')->take(10);
        return view('admin.dashboard', compact('notifications'));
    }

}
