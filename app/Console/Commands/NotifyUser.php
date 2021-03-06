<?php

namespace App\Console\Commands;

use App\Jobs\SendReminderJob;
use App\Mail\ReminderTask;
use Carbon\Carbon;
use DateInterval;
use DateTime;
use DateTimeZone;
use Illuminate\Console\Command;
use LaravelDoctrine\ORM\Facades\EntityManager;

class NotifyUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email reminder about task';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $now = date('Y-m-d H:i:00.0000');
        $date = new DateTime($now, new DateTimeZone('America/Sao_Paulo'));

        $date->add(new DateInterval('PT' . env('REMINDER_BEFORE', 10) . 'M'));

        $tasks = EntityManager::getRepository('App\Task')
            ->findByDate($date);

        foreach ($tasks as $task) {
            echo $task->getTitle();
            echo var_dump($task->getDate());
            echo var_dump($task->getUser()->getEmail());
            dispatch(new SendReminderJob(
                $task->getUser()->getEmail(),
                new ReminderTask($task->getUser(), $task)
            ));
        }
    }
}
