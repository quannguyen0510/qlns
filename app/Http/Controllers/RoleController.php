<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class RoleController extends Controller{
    public function index(){
        return view('admin.role.index');
    }
}
?>
