<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;

class RoleController extends Controller{
    public function index(){
        $this->authorize('viewAny', Role::class);
        return view('admin.role.index');
    }
}
?>
