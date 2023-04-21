<?php

namespace XtendLunar\Features\HubCustomTheme\Features\SidebarMenu\Components\Menus\AppSide;

use Illuminate\View\Component;
use Lunar\Hub\Menu\MenuSection;
use Lunar\Hub\Menu\MenuGroup as Group;

class Section extends Component
{
    public function __construct(
        public MenuSection $section,
        public Group $group,
        public $current = null
    ) {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('hub.features::sidebar-menu.menus.app-side.section');
    }
}
