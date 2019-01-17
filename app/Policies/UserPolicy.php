<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

//授权策略类文件，用于管理用户模型的授权
class UserPolicy
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

    //用于用户更新时的权限验证
    public function update(User $currentUser,User $user)
    {
        return $currentUser->id === $user->id;
    }
}
