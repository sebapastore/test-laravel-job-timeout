<?php

namespace App\Jobs;

use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class TimeOutJobWithoutTransactionRollback implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, Batchable;

    public int $tries = 1;
    public int $timeout = 2;

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        DB::transaction(fn() => sleep(999));
    }
}
