<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Repositories\SalaryRepository;

class SalaryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'salary:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto update all salaries once per day';

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
        $salaryRepo = app()->make(SalaryRepository::class);
        $salaries = $salaryRepo->getTodaySalaries();
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        $day = Carbon::now()->day;
        foreach ($salaries as $key => $salary) {
            $dayWorked = $salary['morning'] + $salary['afternoon'] + $salary['fulltime'];
            $checklist = $salary['checklist'];
            if($checklist[$day] == 4){
                $checklist[$day] = 3;
            }
            $salaryRepo->updateSalaryByYearMonth($salary['id'],$month,$year,$checklist,$dayWorked,$salary['fund']);
        }
    }
}
