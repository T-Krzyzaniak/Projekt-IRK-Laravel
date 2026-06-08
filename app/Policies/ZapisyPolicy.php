<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Zapisy;
use Illuminate\Auth\Access\Response;

class ZapisyPolicy
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
    public function view(User $user, Zapisy $zapisy): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('worker access');

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Zapisy $zapisy): bool
    {
        return $user->can('worker access');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Zapisy $zapisy): bool
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Zapisy $zapisy): bool
    {
        return $user->can('worker access');

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Zapisy $zapisy): bool
    {
        return false;
    }
}
