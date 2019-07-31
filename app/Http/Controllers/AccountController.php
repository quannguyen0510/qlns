<?php
namespace App\Http\Controllers;

use App\Models\Account;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.account.index');
    }

    public function create(){
        return view('admin.account.create');
    }
    
    public function edit($id){
        return view('admin.account.edit');
    }
}
?>
