<div
    x-data="{
        currentRoute: '{{ request()->route()->getName() }}',
        showSubMenu: {'{{ $group->handle }}': false},
        init() {
            this.checkActiveRoute()
        },
        checkActiveRoute() {
            const activeSection = document.querySelector('.section-items .active')?.dataset.groupHandle
            this.showSubMenu['{{ $group->handle }}'] = activeSection === '' && '{{ $group->handle }}' === 'hub.catalogue'
            if (activeSection === '{{ $group->handle }}') {
                this.showSubMenu['{{ $group->handle }}'] = true
            }
        },
        toggleSubMenu() {
            this.showSubMenu['{{ $group->handle }}'] = !this.showSubMenu['{{ $group->handle }}']
        }
    }">
    <header
        class="section-header p-3 bg-[#10141b] border-b border-gray-800 group flex items-center justify-between text-sm font-semibold uppercase cursor-pointer text-white"
        x-on:click.prevent="toggleSubMenu">
        <span class="ml-1">{{ $group->name }}</span>
        <button x-cloak
                class="text-gray-600 hover:text-gray-900 group-hover:bg-gray-50 bg-white/60 rounded p-1">
            <span :class="{ '-rotate-90': showSubMenu }" class="block transition">
                <x-hub::icon ref="chevron-left" class="w-3 h-3" />
            </span>
        </button>
    </header>

    <div x-show="showSubMenu['{{ $group->handle }}']" x-cloak>
        @if (count($group->getItems()))
            @foreach ($group->getItems() as $item)
                <x-hub.feature.sidebar-menu::menus.app-side.link
                    :menu="$menu ?? 'main'"
                    :item="$item"
                    :group-handle="$group->handle"
                    :active="$item->isActive(
                        $current
                    )"
                />
            @endforeach
        @endif

        @if (count($group->getSections()))
            @foreach ($group->getSections() as $section)
                <x-hub.feature.sidebar-menu::menus.app-side.section :section="$section" :current="$current" :group="$group" />
            @endforeach
        @endif
    </div>
</div>
