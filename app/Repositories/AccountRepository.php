<?php
namespace App\Repositories;

use App\Repositories\EloquentRepository;
use App\Models\Account;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Salary;

class AccountRepository extends EloquentRepository
{
    public function getModel()
    {
        return Account::class;
    }
    
    public function createAccountSalary($data)
    {
        $result = null;

        DB::transaction(function() use ($data, $result)
        {
            $account = $this->_model->create($data);
            $checklist = array_fill(1,Carbon::now()->daysInMonth,4);
            $salaryRepo = app()->make(SalaryRepository::class);
            $salaryRepo->create([
                "id_user" => $account->id,
                "year" => Carbon::now()->year,
                "month" => Carbon::now()->month,
                "day_worked" => 0,
                "bonus_project" => 0,
                "total" => 0,
                "checklist" => json_encode($checklist)
            ]);
            $result = $account;
        });
        return $result;
    }

    public function getAccounts($isAdmin)
    {
        if(!$isAdmin){
            return $this->_model
                ->where('id_role','<>','1')
                ->get();
        }
        return $this->getAll();
    }

    public function getAccountRole($id)
    {
        return $this->find($id)
            ->roles()
            ->first();
    }
}
?>
