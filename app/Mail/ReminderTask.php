<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReminderTask extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    protected $task;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $task)
    {
        $this->user = $user;
        $this->task = $task;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.reminder_task')
            ->subject($this->task->getTitle())
            ->from('vilaapp@reminder.com', 'Villa reminder')
            ->with([
                'user' => $this->user,
                'task' => $this->task
            ]);
    }
}