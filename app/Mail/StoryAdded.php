<?php

namespace App\Mail;

use App\Models\Story;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StoryAdded extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $tries = 3;

    public function __construct(private Story $story)
    {
    }

    public function build(): StoryAdded
    {
        return $this->markdown('emails.story_added', [
            'title' => $this->story->title,
            'description' => $this->story->description,
            'url' => \sprintf("%s/admin/stories/%s/approve", env('APP_URL'), $this->story->id),
        ]);
    }

    public function failed(\Throwable $exception): void
    {
        info('Job failed: ', [
            'exception' => $exception,
        ]);
    }
}
