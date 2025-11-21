<?php

namespace App\Http\Controllers\Dashboard\Voter;

use App\DataTables\Voter\VoterDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Voter\StoreRequest;
use App\Http\Requests\Dashboard\Voter\UpdateRequest;
use App\Models\Batch;
use App\Models\Voter;
use Illuminate\Support\Facades\Log;

class VoterController extends Controller
{
    /**
     * Generate a unique vote token based on the voter's email.
     */
    private function generateVoteToken(string $email): string
    {
        $emailPrefix = strstr($email, '@', true);
        $lettersOnly = preg_replace('/[^a-zA-Z]/', '', str_shuffle($emailPrefix));
        $lettersOnly = str_pad($lettersOnly, 3, 'X');

        $len = strlen($lettersOnly);
        $salt = $lettersOnly[0] . $lettersOnly[(int)($len / 2)] . $lettersOnly[$len - 1];

        $yearHex = str_pad(dechex((int) date('Y')), 4, '0', STR_PAD_LEFT);
        $randomString = substr(bin2hex(random_bytes(2)), 0, 4);

        return strtoupper("{$salt}-{$yearHex}-{$randomString}");
    }

    /**
     * Display a listing of the resource.
     */
    public function index(VoterDataTable $dataTable)
    {
        $batches = Batch::select('id', 'name')->get();

        return $dataTable->render('dashboard.voters.index', compact('batches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        try {
            $data['vote_token'] = $this->generateVoteToken($data['email']);
            $data = Voter::create($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Voter created successfully.',
                'data' => $data,
            ], 201);
        } catch (\Throwable $th) {
            Log::error('Error creating voter: ' . $th->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create voter.',
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Voter $voter)
    {
        $data = $request->validated();

        try {
            $voter->update($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Voter updated successfully.',
                'data' => $voter,
            ], 200);
        } catch (\Throwable $th) {
            Log::error('Error updating voter: ' . $th->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update voter.',
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voter $voter)
    {
        try {
            $voter->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Voter deleted successfully.',
            ], 200);
        } catch (\Throwable $th) {
            Log::error('Error deleting voter: ' . $th->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete voter.',
            ], 500);
        }
    }
}
