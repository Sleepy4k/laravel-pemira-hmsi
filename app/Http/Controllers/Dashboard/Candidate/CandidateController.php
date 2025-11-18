<?php

namespace App\Http\Controllers\Dashboard\Candidate;

use App\DataTables\Candidate\CandidateDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Candidate\StoreRequest;
use App\Http\Requests\Dashboard\Candidate\UpdateRequest;
use App\Models\Candidate;
use App\Models\CandidateMission;
use App\Models\CandidateProgram;
use App\Models\CandidateVision;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CandidateDataTable $dataTable)
    {
        return $dataTable->render('dashboard.candidates.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.candidates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $candidate = Candidate::create([
                'number' => $data['number'],
                'head_name' => $data['head_name'],
                'vice_name' => $data['vice_name'],
                'photo' => $data['photo'] ?? null,
                'resume' => $data['resume'] ?? null,
                'attachment' => $data['attachment'] ?? null,
            ]);

            CandidateVision::create([
                'candidate_id' => $candidate->id,
                'vision' => $data['vision'],
            ]);

            foreach ($data['missions'] as $mission) {
                CandidateMission::create([
                    'candidate_id' => $candidate->id,
                    'point' => $mission,
                ]);
            }

            foreach ($data['programs'] as $program) {
                CandidateProgram::create([
                    'candidate_id' => $candidate->id,
                    'point' => $program,
                ]);
            }

            DB::commit();

            if ($request->wantsJson()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Candidate created successfully.',
                    'data' => $candidate,
                ], 201);
            }

            return to_route('dashboard.candidates.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error creating candidate: '.$th->getMessage());

            if ($request->wantsJson()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Failed to create candidate.',
                    'data' => null,
                ], 500);
            }

            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        //
    }
}
