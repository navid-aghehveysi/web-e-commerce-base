<?php

namespace App\Traits\Model\Authorize;

trait HasPermissionsTrait
{

    public function hasPermission($permission)
    {
        return (bool) $this->permissions->contains('name', $permission->name);
    }

    public function hasPermissionTo($permission)
    {
        return $this->hasPermission($permission) || $this->hasPermissionThroughRole($permission);
    }
    public function hasPermissionThroughRole($permission)
    {
        foreach ($permission->roles as $role) {

            if($this->roles->contains('name', $role->name)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole(...$roles)
    {
        foreach ($roles as $role) {
            if ($this->roles->contains('name', $role)) {
                return true;
            }
        }
        return false;
    }
}
