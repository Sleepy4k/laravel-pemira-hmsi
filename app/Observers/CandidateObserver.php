<?php

namespace App\Observers;

use App\Enums\UploadFileType;
use App\Facades\File;
use App\Models\Candidate;

class CandidateObserver
{
    /**
     * Handle the Candidate "creating" event.
     */
    public function creating(Candidate $candidate): void
    {
        $candidate->photo = $candidate->photo
            ? File::saveSingleFile(UploadFileType::CANDIDATE_PHOTO, $candidate->photo)
            : null;

        $candidate->resume = $candidate->resume
            ? File::saveSingleFile(UploadFileType::CANDIDATE_DOCUMENT, $candidate->resume)
            : null;

        $candidate->attachment = $candidate->attachment
            ? File::saveSingleFile(UploadFileType::CANDIDATE_ATTACHMENT, $candidate->attachment)
            : null;
    }

    /**
     * Handle the Candidate "updating" event.
     */
    public function updating(Candidate $candidate): void
    {
        if ($candidate->isDirty('photo')) {
            $candidate->getOriginal('photo')
                ? File::deleteFile(UploadFileType::CANDIDATE_PHOTO, $candidate->getOriginal('photo'))
                : null;
        }

        if ($candidate->isDirty('resume')) {
            $candidate->getOriginal('resume')
                ? File::deleteFile(UploadFileType::CANDIDATE_DOCUMENT, $candidate->getOriginal('resume'))
                : null;
        }

        if ($candidate->isDirty('attachment')) {
            $candidate->getOriginal('attachment')
                ? File::deleteFile(UploadFileType::CANDIDATE_ATTACHMENT, $candidate->getOriginal('attachment'))
                : null;
        }
    }

    /**
     * Handle the Candidate "deleting" event.
     */
    public function deleting(Candidate $candidate): void
    {
        $candidate->photo
            ? File::deleteFile(UploadFileType::CANDIDATE_PHOTO, $candidate->photo)
            : null;

        $candidate->resume
            ? File::deleteFile(UploadFileType::CANDIDATE_DOCUMENT, $candidate->resume)
            : null;

        $candidate->attachment
            ? File::deleteFile(UploadFileType::CANDIDATE_ATTACHMENT, $candidate->attachment)
            : null;
    }
}
