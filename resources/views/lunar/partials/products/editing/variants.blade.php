<div class="shadow sm:rounded-md">
    <div class="flex-col space-y-4 rounded-t-xl bg-white">
        <header class="flex items-center justify-between gap-1 rounded-t-xl bg-[#353F4F] p-3">
            <div class="flex">
                <x-akar-info class="h-6 w-6 text-[#CFA55B]" />
                <span class="ml-2 text-sm font-semibold text-white">
                    {{ __('adminhub::partials.products.variants.heading') }}
                    <p class="text-sm text-gray-400">{{ __('adminhub::partials.products.variants.strapline') }}</p>
                </span>
            </div>
            <div>
                <x-hub::input.toggle wire:model="variantsEnabled" />
            </div>
        </header>
        @if ($this->getVariantsCount() <= 1)
            <div>
                @include('adminhub::partials.attributes', [
                    'attributeGroups' => $this->variantAttributeGroups,
                    'mapping' => 'variantAttributes',
                    'inline' => true,
                ])
            </div>
        @endif
        @if ($variantsEnabled)
            @if ($this->getVariantsCount() <= 1)
                @include('adminhub::partials.products.editing.options')
            @else
                @livewire('hub.components.products.variants.table', [
                    'product' => $this->product,
                ])
            @endif
        @endif
    </div>
</div>
