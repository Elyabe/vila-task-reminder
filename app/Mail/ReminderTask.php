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
            ->subject("[VILA TASK REMINDER] {$this->task->getTitle()}")
            ->from(env('MAIL_ADDRESS_FROM', 'not-answer@vila.challenge.com'), env('MAIL_NAME_FROM'))
            ->with([
                'user' => $this->user,
                'task' => $this->task
            ]);
    }
}
