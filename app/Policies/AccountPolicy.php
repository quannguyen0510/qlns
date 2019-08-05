<?php

namespace App\Policies;

use App\User;
use App\Models\Account;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class AccountPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any accounts.
     *
     * @param \App\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->id_role == config('custom.id_Admin');
    }

    /**
     * Determine whether the user can view the account.
     *
     * @param \App\User $user
     * @param \App\Account $account
     * @return mixed
     */
    public function view(User $user, Account $account)
    {
        //
    }

    /**
     * Determine whether the user can create accounts.
     *
     * @param \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->id_role == config('custom.id_Admin');
    }

    /**
     * Determine whether the user can update the account.
     *
     * @param \App\User $user
     * @param \App\Account $account
     * @return mixed
     */
    public function update(User $user, Account $account)
    {
        return $user->id_role == config('custom.id_Admin') || $user->id = $account->user_id;
    }

    /**
     * Determine whether the user can delete the account.
     *
     * @param \App\User $user
     * @param \App\Account $account
     * @return mixed
     */
    public function delete(User $user, Account $account)
    {
        return $user->id_role == config('custom.id_Admin') || $user->id = $account->user_id;
    }

    /**
     * Determine whether the user can restore the account.
     *
     * @param \App\User $user
     * @param \App\Account $account
     * @return mixed
     */
    public function restore(User $user, Account $account)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the account.
     *
     * @param \App\User $user
     * @param \App\Account $account
     * @return mixed
     */
    public function forceDelete(User $user, Account $account)
    {
        //
    }
}
