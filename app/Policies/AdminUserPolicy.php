<?php

namespace App\Policies;

use App\AdminUser;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class AdminUserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function remove(AdminUser $adminUser, $targetAdminUser)
    {
        if($targetAdminUser->id == 1){
            return Response::deny('Can change any thing about Super Admin');
        }
        return true;
    }

    public function modify(AdminUser $adminUser, $targetAdminUser)
    {
        if($targetAdminUser->id ==1){
            if($adminUser->id <> $targetAdminUser->id){
                return Response::deny('Only Super Admin Have Access to Edit');
            }

        }
        return true;

    }
}
