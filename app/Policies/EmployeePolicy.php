<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\User;


class EmployeePolicy
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
        return in_array($user->role, ['super-admin', 'holding-admin', 'haka-admin', 'eln-admin', 'eln2-admin', 'rmm-admin', 'bofi-admin']);
    }
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $authUser, Employee $targetUser): bool
    {
        // Role admin tetap bisa update siapa saja
        if (in_array($authUser->role, [
            'super-admin',
            'holding-admin',
            'haka-admin',
            'eln-admin',
            'eln2-admin',
            'rmm-admin',
            'bofi-admin'
        ])) {
            return true;
        }

        // Karyawan hanya bisa update dirinya sendiri
        if ($authUser->role === 'employee') {
            return $authUser->employee_id === $targetUser->id;
        }

        // Role lain tidak diizinkan
        return false;
    }
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return in_array($user->role, ['super-admin', 'holding-admin', 'haka-admin', 'eln-admin', 'eln2-admin', 'rmm-admin', 'bofi-admin']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user): bool
    {
        return true;
    }
}
