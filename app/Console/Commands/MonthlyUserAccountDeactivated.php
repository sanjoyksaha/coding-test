<?php

namespace App\Console\Commands;

use App\Model\PaymentInfo;
use App\User;
use Illuminate\Console\Command;

class MonthlyUserAccountDeactivated extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'account:deactivate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatic User Account Deactivated When Subscription Is Expired.';

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
        // Find all user from payment info table where account deactivated date is today
        $get_user_id = PaymentInfo::whereDate('deactivated_at', date("Y-m-d"))->get();

        foreach($get_user_id as $user_id):

            User::where('id', $user_id->user_id)->update(['status' => 0]);

        endforeach;

        echo "Done";
    }
}
