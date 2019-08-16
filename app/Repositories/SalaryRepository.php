<?php
namespace App\Repositories;

use App\Repositories\EloquentRepository;
use App\Models\Salary;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SalaryRepository extends EloquentRepository
{
    public function getModel()
    {
        return Salary::class;
    }

    public function getSalaryByYearMonth($id,$month,$year)
    {
        return $this->_model
            ->where('id_user',$id)
            ->where('year',$year)
            ->where('month',$month)
            ->first();
    }

    public function updateSalaryByYearMonth($id, $month, $year, $checklist, $fund, $dayWorked)
    {
        $checklist = json_encode((object)$checklist,true);
        $this->_model
            ->where('id_user',$id)
            ->where('year',$year)
            ->where('month',$month)
            ->update([
                'checklist' => $checklist,
                'day_worked' => $dayWorked,
                'total' => $fund
            ]);
    }

    public function checkpoint($data)
    {
        extract($data);

        $day = Carbon::now()->day;
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        $salary = $this->getSalaryByYearMonth($id,$month,$year);

        $accountRepo = app()->make(AccountRepository::class);
        $account = $accountRepo->find($id);
        $fixed = $account->roles()->first()->fixed_salary;
        
        $checklist = json_decode($salary->checklist,true);
        $checklist[$day] = $mode;        

        $morningCount = count(array_filter($checklist,function($v){
            return $v == 1;
        }));
        $afternoonCount = count(array_filter($checklist,function($v){
            return $v == 2;
        }));
        $offlineCount = count(array_filter($checklist,function($v){
            return $v == 0;
        }));

        $temp = $checklist;
        $fullCount = count(array_filter(array_splice($temp,0,$day),function($v){
            return $v == 3;
        }));
        $fund = (($morningCount+$afternoonCount)*0.5 + $fullCount)*$fixed ;
        $dayWorked = $fullCount + $morningCount + $afternoonCount;
        $this->updateSalaryByYearMonth($id,$month,$year,$checklist,$fund,$dayWorked);

        return [
            "morning" => $morningCount,
            "afternoon" => $afternoonCount,
            "offline" => $offlineCount,
            "fulltime" => $fullCount,
            "fund" => $fund
        ];
    }

    public function getTodaySalaries()
    {
        $day = Carbon::now()->day;
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        $data = [];

        $accountRepo = app()->make(AccountRepository::class);
        $accounts = $accountRepo->getAccounts(false);

        foreach ($accounts as $account) {
            $salary = $account->salaries()
                ->where('year',$year)
                ->where('month',$month)
                ->first();
            $checklist = json_decode($salary->checklist,true);
            $fixed = $accountRepo->getAccountRole($account->id)->fixed_salary;

            $morningCount = count(array_filter($checklist,function($v){
                return $v == 1;
            }));
            $afternoonCount = count(array_filter($checklist,function($v){
                return $v == 2;
            }));
            $offlineCount = count(array_filter($checklist,function($v){
                return $v == 0;
            }));
            $temp = $checklist;
            $fullCount = count(array_filter(array_splice($temp,0,$day),function($v){
                return $v == 3;
            }));
            $fund = (($morningCount+$afternoonCount)*0.5 + $fullCount)*$fixed ;
            $data[] = [
                "id" => $account['id'],
                "name" => $account['name'],
                "fixed_salary" => $fixed,
                "morning" => $morningCount,
                "afternoon" => $afternoonCount,
                "offline" => $offlineCount,
                "fulltime" => $fullCount,
                "fund" => $fund,
                "checklist" => $checklist
            ];
        }
        return $data;
    }

}
?>
