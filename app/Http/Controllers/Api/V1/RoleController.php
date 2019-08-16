<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;
use App\Http\Requests\Role\StoreRole;

class RoleController extends Controller{
    
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        return $this->roleRepository->getAll();
    }

    public function store(StoreRole $request)
    {
        $result = $this->roleRepository->create($request->all());
        return $result;
    }
    
    public function destroy($id)
    {
        $this->roleRepository->delete($id);
    }

    public function getUserRoles(){
    }
}
?>
