<?php

namespace App\Policies;

use App\Models\Claim;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;

class ClaimPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return !$user->isClient();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Claim $claim)
    {
        if(Auth::user()->id === $claim->owner_id || Auth::user()->isAdmin()){
            return  true;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Claim $claim)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Claim $claim)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Claim $claim)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Claim $claim)
    {
        //
    }

    public function checkUser(User $user){

       return $user->checkStatus();

    }

    public function checkAdmin(User $user){

        return $user->isAdmin();

    }

    public function checkGestor(User $user){

        return $user->isGestor();

    }

    public function checkAssociate(User $user){

        return $user->isAssociate();

    }
}
