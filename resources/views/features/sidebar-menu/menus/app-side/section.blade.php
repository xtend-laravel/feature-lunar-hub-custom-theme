<div
    x-data="{
        showSubMenu: {{ ($section->isActive($current) || $section->hasActive($current)) ? 'true' : 'false' }},
    }"
>
    <x-hub.feature.sidebar-menu::menus.app-side.link
        menu="main"
        :item="$section"
        :group-handle="$group->handle"
        :active="$section->isActive($current) || $section->hasActive($current)"
        :has-sub-items="!$section->getItems()->isEmpty()"
    />

    @if ($section->getItems()->count())
        <nav
            class="mt-2 bg-black/30"
            x-show="showSubMenu"
            x-cloak
        >
            @foreach ($section->getItems() as $item)
                <x-hub.feature.sidebar-menu::menus.app-side.sub-link
                    :item="$item"
                    :active="$item->isActive($current)"
                    :group-handle="$group->handle"
                />
            @endforeach
        <nav>
    @endif
</div>
