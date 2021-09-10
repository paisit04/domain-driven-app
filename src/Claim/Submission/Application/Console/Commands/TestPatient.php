<?php

namespace Claim\Submission\Application\Console\Commands;

use Illuminate\Console\Command;

use Claim\Submission\Domain\Models\Patient;
use App\ValueObjects\Address;

class TestPatient extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'patient:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Patient Model';

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
        $address = new Address('101 W. Broadway, San Diego, CA. 91977');
        $patient = new Patient;
        $patient->address = $address;
        $patient->save();

        $this->info('Address: ' . $address);
        $this->info('Type Address: ' . gettype($address));
        $this->info('Patient Address: ' . $patient->address);
        $this->info('Type Patient Address: ' . gettype($patient->address));
        $this->info('Patient Address Value: ' . $patient->address->getValue());
        $this->info('Type Patient Address Value: ' . gettype($patient->address->getValue()));
        return 0;
    }
}
