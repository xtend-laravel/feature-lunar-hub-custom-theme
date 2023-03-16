<div class="shadow sm:rounded-md">
    <div class="flex-col space-y-4 rounded-t-xl bg-white">

        <header class="flex items-center gap-1 rounded-t-xl bg-[#353F4F] p-3">
            <x-akar-info class="h-6 w-6 text-[#CFA55B]" />
            <span class="ml-2 text-sm font-semibold text-white">
                {{ __('adminhub::partials.products.basic-information.heading') }}
            </span>
        </header>

        <div class="space-y-4 p-6">
            <x-hub::input.group
                    :label="__('adminhub::inputs.brand.label')"
                    for="brand"
                    :errors="$errors->get('product.brand_id') ?: $errors->get('brand')"
            >
                <div class="flex items-center space-x-4">
                    <div class="grow">
                        @if($useNewBrand)
                            <x-hub::input.text wire:model="brand" />
                        @else
                            <x-hub::input.select
                                    id="brand"
                                    wire:model="product.brand_id"
                                    :error="$errors->first('product.brand_id')"
                            >
                                <option value>{{ __('adminhub::components.brands.choose_brand_default_option') }}</option>
                                @foreach($this->brands as $brand)
                                    <option
                                            value="{{ $brand->id }}"
                                            wire:key="{{ $brand->id }}"
                                    >{{ $brand->name }}</option>
                                @endforeach
                            </x-hub::input.select>
                        @endif
                    </div>
                    <div>
                        @if($useNewBrand)
                            <x-hub::button
                                    theme="gray"
                                    type="button"
                                    wire:click="$set('useNewBrand', false)"
                            >
                                {{ __('adminhub::global.cancel') }}
                            </x-hub::button>
                        @else
                            <x-hub::button
                                    theme="gray"
                                    type="button"
                                    wire:click="$set('useNewBrand', true)"
                            >
                                {{ __('adminhub::global.add_new') }}
                            </x-hub::button>
                        @endif

                    </div>
                </div>
            </x-hub::input.group>

            <x-hub::input.group
                    :label="__('adminhub::inputs.product-type.label')"
                    for="productType"
            >
                <x-hub::input.select
                        id="productType"
                        wire:model="product.product_type_id"
                >
                    @foreach($this->productTypes as $type)
                        <option
                                value="{{ $type->id }}"
                                wire:key="{{ $type->id }}"
                        >{{ $type->name }}</option>
                    @endforeach
                </x-hub::input.select>
            </x-hub::input.group>

            <x-hub::input.group
                    :label="__('adminhub::inputs.tags.label')"
                    for="tags"
            >
                <x-hub::input.tags
                        id="tags"
                        wire:model="tags"
                />
            </x-hub::input.group>
        </div>
    </div>
</div>
