<?php
namespace App\Repositories;

use App\Repositories\EloquentRepository;
use App\Models\Account;

class AccountRepository extends EloquentRepository{
    public function getModel()
    {
        return Account::class;
    }
}
?>
