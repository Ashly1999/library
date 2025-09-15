<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\StatusMail;
use Carbon\Carbon;
class SendDueDateReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send-due-date-reminder';
    protected $description = 'Send reminder emails when user due_date is expired';
    /**
     * The console command description.
     *
     * @var string
     */
  

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $today = Carbon::today();
        $users = User::whereDate('due_date', '<=', $today)->get();

        foreach ($users as $user) {
            Mail::to($user->email)->send(new StatusMail($user, $user->status, $user->due_date));
        }

        $this->info('Due date reminder emails sent successfully.');
    }
}
