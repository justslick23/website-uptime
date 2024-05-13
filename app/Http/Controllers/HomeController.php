<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $totalWebsites = 50;
        $onlineWebsites = 40;
        $offlineWebsites = $totalWebsites - $onlineWebsites;
        $averageResponseTime = 150; // milliseconds
    
        // Dummy data for website list
        $websites = [
            (object) ['url' => 'https://example1.com', 'status' => 'Online', 'response_time' => 100, 'created_at' => now()->subDays(5), 'uptime_minutes' => 720],
            (object) ['url' => 'https://example2.com', 'status' => 'Offline', 'response_time' => null, 'created_at' => now()->subDays(10), 'uptime_minutes' => 360],
            // Add more dummy website data as needed
        ];
    
        // Pass the data to the view
        return view('dashboard', compact('totalWebsites', 'onlineWebsites', 'offlineWebsites', 'averageResponseTime', 'websites'));
    }
}
