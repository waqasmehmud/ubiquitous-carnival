<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserDeletionNotification;
use Carbon\Carbon;
use App\Models\User;

class DeleteBlockedUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        $usersToDelete = User::where('blocked', true)
            ->where('blocked_at', '<=', Carbon::now()->subHours(48))
            ->get();

        foreach ($usersToDelete as $user) {
            // Notify the user via email one day before deleting their account
            Mail::to($user->email)->send(new UserDeletionNotification());
            $user->delete();
        }
    }
}
