<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;

class UpdateStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        \Log::info("Cron is working fine!");

        \DB::table('bookings')->where('status', BOOKING_PENDING)->whereDate('created_at', '<=', Carbon::now()->subDays(1)->toDateTimeString())->update(['status' => BOOKING_REJECTED]);
        \DB::table('bookings')->where('status', BOOKING_REJECTED)->whereDate('created_at', '<=', Carbon::now()->subDays(7)->toDateTimeString())->delete();

        $this->info('Update:Status Command Run successfully!');
    }
}
