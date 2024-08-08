<?php

namespace App\Listeners;

use App\Events\SubmissionSaved;
use Illuminate\Support\Facades\Log;

class LogSavedSubmissionDetails
{
    /**
     * Handle the event.
     */
    public function handle(SubmissionSaved $event): void
    {
        $submission = $event->submission;

        Log::info('SUBMISSION_SAVED_SUCCESSFULLY', [
            'name' => $submission->name,
            'email' => $submission->email,
        ]);
    }
}
