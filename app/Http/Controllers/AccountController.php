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
        $this->authorize('viewAny', Account::class);
        return view('admin.account.index');
    }

    public function create(){
        $this->authorize('create', Account::class);
        return view('admin.account.create');
    }

    public function edit($id){
        $account = Account::find($id);
        $this->authorize('update', $account);
        return view('admin.account.edit');
    }
}
?>
