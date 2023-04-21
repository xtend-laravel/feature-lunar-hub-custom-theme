<div
    @class([
        'group flex space-x-4 hover:bg-gray-100',
        'hover:!bg-[#B8A179]' => $menu === 'main',
        'justify-between items-center' => $hasSubItems
    ])
>
    <a data-group-handle="{{ $groupHandle ?? '' }}"
       href="{{ route($item->route) }}"
       @class([
           'flex items-center w-full text-sm font-medium py-3 px-4 gap-2 text-gray-500',
           'bg-[#ececec] text-gray-900 active' => $active,
           'text-white' => !$active && $menu === 'main',
       ])
    >
        <span x-cloak>
            {!! $item->renderIcon('w-5 h-5') !!}
        </span>

        <span>
            {{ $item->name }}
        </span>
    </a>


    @if ($hasSubItems)
        <button x-cloak
                x-on:click.prevent="showSubMenu = !showSubMenu"
                class="text-gray-400 hover:text-gray-900 hover:bg-gray-50 p-2">
            <span :class="{ '-rotate-90': showSubMenu }"
                  class="block transition">
                <x-hub::icon ref="chevron-left"
                             class="w-3 h-3" />
            </span>
        </button>
    @endif
</div>
