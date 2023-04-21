<?php

namespace XtendLunar\Features\HubCustomTheme\Features\SidebarMenu\Components\Menus;

use Illuminate\View\Component;

class MenuList extends Component
{
    public $menu;

    public $sections;

    public $items;

    public $active;

    public function __construct($menu, $sections, $items, $active)
    {
        $this->menu = $menu;

        $this->sections = $sections;

        $this->items = $items;

        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('hub.features::sidebar-menu.menus.menu-list');
    }
}
