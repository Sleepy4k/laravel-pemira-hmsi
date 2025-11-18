<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Voter;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $votes = Voter::select('id', 'has_voted')
            ->with('batch:id')
            ->get();

        $votingStatus = [
            'hasVoted' => $votes->where('has_voted', true)->count(),
            'notVoted' => $votes->where('has_voted', false)->count(),
        ];

        $votesGroupedByBatch = $votes->groupBy('batch.id');
        $votesPerBatch = [
            ['name' => 'Voted', 'data' => []],
            ['name' => 'Not Voted', 'data' => []],
        ];

        foreach ($votesGroupedByBatch as $voters) {
            $votesPerBatch[0]['data'][] = $voters->where('has_voted', true)->count();
            $votesPerBatch[1]['data'][] = $voters->where('has_voted', false)->count();
        }

        $batchIds = $votes->pluck('batch.id')->unique()->toArray();
        $batches = Batch::select('name')->whereIn('id', $batchIds)->get();

        if ($batches->isEmpty()) {
            $batches = Batch::select('name')->orderBy('name')->get();
        }

        return view('dashboard.home', compact('votesPerBatch', 'votingStatus', 'batches'));
    }
}
