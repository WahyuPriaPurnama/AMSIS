<?php

namespace App\Policies;

use App\Models\Subsidiary;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SubsidiaryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Subsidiary $subsidiary): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role==='super admin';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Subsidiary $subsidiary): bool
    {
        return $user->role==='super admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Subsidiary $subsidiary): bool
    {
        return $user->role==='super admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Subsidiary $subsidiary): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Subsidiary $subsidiary): bool
    {
        return true;
    }
}
