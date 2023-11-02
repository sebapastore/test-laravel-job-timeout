<?php

namespace App\Listeners;

use App\Jobs\TimeOutJobWithTransactionRollback;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HandleJobTimingOut
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        Log::info("handle job timing out");

        if ($event->job->resolveName() === TimeOutJobWithTransactionRollback::class) {
            Log::info('TimeOutJobWithTransactionRollback');
            DB::rollBack();
        }
    }
}
