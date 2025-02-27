<?php

namespace App\Policies;

use App\Models\{User, Role, Order};
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function create_order(User $user)
    {
        return $user->role_id == Role::CUSTOMER_ID;
    }


    public function cancel_order(User $user, Order $order)
    {
        return $user->role_id == Role::CUSTOMER_ID && $order->user_id == $user->id;
    }


    public function edit_order(User $user, Order $order)
    {
        return $user->role_id == Role::CUSTOMER_ID && $order->user_id == $user->id;
    }

    public function my_real_order(User $user, Order $order)
    {
        return  $user->role_id == Role::ADMIN_ID || ($user->role_id == Role::CUSTOMER_ID && $order->user_id == $user->id);
    }

}
