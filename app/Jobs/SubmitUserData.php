<?php

namespace App\Jobs;

use App\Events\SubmissionSaved;
use App\Models\Submission;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SubmitUserData implements ShouldQueue
{
    use Queueable;

    //We can use DTO (Data Transfer Object) to pass data between layers
    public function __construct(private array $data)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $submission = Submission::create($this->data);

        event(new SubmissionSaved($submission));
    }
}
