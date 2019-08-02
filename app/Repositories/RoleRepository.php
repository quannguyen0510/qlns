<?php
namespace App\Repositories;

use App\Repositories\EloquentRepository;
use App\Models\Role;

class RoleRepository extends EloquentRepository{
    public function getModel()
    {
        return Role::class;
    }
}
?>
