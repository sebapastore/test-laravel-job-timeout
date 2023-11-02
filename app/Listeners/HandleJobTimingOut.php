<?php

namespace App\Listeners;

use App\Jobs\TimeOutJobWithTransactionRollback;
use Illuminate\Support\Facades\DB;

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
        if ($event->job->resolveName() === TimeOutJobWithTransactionRollback::class) {
            DB::rollBack();
        }
    }
}
