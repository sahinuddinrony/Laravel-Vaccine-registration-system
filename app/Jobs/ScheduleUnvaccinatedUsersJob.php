<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use App\Mail\VaccinationScheduled;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

use Carbon\Carbon;

class ScheduleUnvaccinatedUsersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
        //
    }

    public function handle(): void
    {

        $users = User::where('status', 'notvaccinated')
            ->orderBy('created_at')
            ->with('center')
            ->get();

        foreach ($users as $user) {

            if ($user->center->limit > 0) {
                $user->update([
                    'status' => 'scheduled',
                    'scheduled_date' => Carbon::now()->addDays(7),
                ]);
                $user->center->decrement('limit');

                //Mail::to($user->email)->send(new VaccinationScheduled($user));
            }
        }
    }

}

