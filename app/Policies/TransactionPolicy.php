<?php

namespace App\Policies;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TransactionPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Transaction $transaction)
    {
        return $user->role == 'admin' || $user->role == 'editor' || $user->role == 'user' ? Response::allow()
                : Response::deny('You do not own this transaction.');
    }

    public function create(User $user)
    {
        return $user->role == 'admin' ? Response::allow()
                : Response::deny('You do not own this transaction.');
    }

    public function update(User $user, Transaction $transaction)
    {
        return $user->role == 'admin' || $user->role == 'editor' ? Response::allow()
                : Response::deny('You do not own this transaction.');
    }

    public function delete(User $user, Transaction $transaction)
    {
        return $user->role == 'admin' ? Response::allow()
                : Response::deny('You do not own this transaction.');
    }

    public function restore(User $user, Transaction $transaction)
    {
        //
    }

    public function forceDelete(User $user, Transaction $transaction)
    {
        //
    }
}
