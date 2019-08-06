<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\StoreAccount;
use App\Http\Requests\Account\UpdateAccount;
use App\Http\Requests\Account\UpdateRole;
use App\Repositories\AccountRepository;

class AccountController extends Controller
{
    protected $accountRepository;

    public function __construct(AccountRepository $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->accountRepository->getAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAccount $request)
    {
        $data = $request->all();
        if($request->hasFile('avatar')) {
            $file = Input::file('avatar');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalExtension();
            $data['avatar'] = $name;
            $file->move('public/images/', $name);
        }
        $account = $this->accountRepository->create($data);
        return $account;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->accountRepository->find($id);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAccount $request, $id)
    {
        $data = $request->all('name', 'email', 'phone', 'password');
        $result = $this->accountRepository->update($id,$data);
        return $result;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->accountRepository->delete($id);
    }

    public function updateRole(UpdateRole $request)
    {
        $data  = $request->only(['id','id_role']);
        $result = $this->accountRepository->update($data['id'],$data);
        return $result;
    }
}
?>
