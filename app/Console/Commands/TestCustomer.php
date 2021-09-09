<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Customer;

class TestCustomer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'customer:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Customer Model';

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
        $customer = new Customer;
        $customer->name = "Jesse griffin";
        $customer->phone = "6197779125";
        $customer->phone_type = 1;

        $this->info('Name: ' . $customer->name);
        $this->info('Phone: ' . $customer->phone);
        $this->info('Phone Type: ' . $customer->phone_type);
        $this->info('Raw Phone Type: ' . $customer->getAttributes()['phone_type']);
        return 0;
    }
}
