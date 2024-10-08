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
    public function view(User $user): bool
    {
        return in_array($user->role, ['super-admin', 'holding-admin', 'haka-admin', 'eln-admin', 'eln2-admin', 'rmm-admin', 'bofi-admin']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return in_array($user->role, [
            'super-admin',
            'holding-admin'
        ]);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return in_array($user->role, ['super-admin', 'holding-admin']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return $user->role === 'super-admin';
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
