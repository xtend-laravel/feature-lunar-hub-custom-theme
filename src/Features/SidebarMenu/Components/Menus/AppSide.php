<?php

namespace XtendLunar\Features\HubCustomTheme\Features\SidebarMenu\Components\Menus;

use Illuminate\View\Component;

class AppSide extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('hub.features::sidebar-menu.menus.app-side');
    }
}
