<?php

namespace Domain\Admin\Policies;

use Domain\Admin\Models\Admin;
use Domain\Admin\Models\Menu;
use Domain\Admin\Models\MenuVisibility;

class AdminRolePolicy
{
    /**
     * Create a new policy instance.
     */
    public function accessDomain(Admin $admin, Menu $menu)
    {
        return MenuVisibility::where('menu_id', $menu->id)
            ->where('job_title_id', $admin->job_title_id)
            ->exists();
    }
}
