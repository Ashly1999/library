<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Mail\DueDateMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class DueDateReminder extends Command
{
    // Command name
    protected $signature = 'app:due-date-reminder';

    // Description
    protected $description = 'Send reminder email 1 day before user due date';

    public function handle()
    {
        // Get tomorrow's date
        $tomorrow = Carbon::tomorrow()->format('Y-m-d');

        // Get users whose due_date is tomorrow
        $users = User::whereDate('due_date', $tomorrow)->get();

        foreach ($users as $user) {
            if ($user->email) {
                // Send reminder email
                Mail::to($user->email)->send(new DueDateMail($user, $user->due_date));

                // Log info
                $this->info("Reminder sent to: " . $user->email);
            } else {
                $this->info("User {$user->name} has no email, skipping.");
            }
        }

        $this->info("Due date reminders sent successfully!");
    }
}
