<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $votesPerSession = [
            [
                'name' => 'Voted',
                'data' => [30, 40, 45, 50, 49, 60],
            ],
            [
                'name' => 'Not Voted',
                'data' => [20, 30, 25, 40, 39, 50],
            ],
        ];

        $votingStatus = [
            'hasVoted' => 12,
            'notVoted' => 8,
        ];

        return view('dashboard.home', compact('votesPerSession', 'votingStatus'));
    }
}
