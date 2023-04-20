<!DOCTYPE html>
<html lang="en"
      class="h-full">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0" />

    <title>{{ $title ?? 'Hub' }} | {{ config('app.name') }}</title>

    <x-hub::branding.favicon />

    <!-- @todo Perhaps move as we are relying on scaleflex.cloudimg.io to be running at all times -->
    <script defer
            src="https://scaleflex.cloudimg.io/v7/plugins/filerobot-image-editor/latest/filerobot-image-editor.min.js"></script>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet" />

    <!-- Note: This should be behind a feature flag disabled if filament tables is used -->
    @livewireTableStyles

    @vite(['resources/css/hub-extend.css', 'resources/js/hub-extend.js'])

    <!-- Note: We do not use the default app.css file, but instead use the Vite version. -->
    <link href="{{ asset('vendor/lunar/admin-hub/app.css?v=1') }}" rel="stylesheet">

    @if ($styles = \Lunar\Hub\LunarHub::styles())
        @foreach ($styles as $asset)
            <link href="{!! $asset->url() !!}"
                  rel="stylesheet">
        @endforeach
    @endif

    <style>
        .filepond--credits {
            display: none !important;
        }
    </style>

    <!-- Note: We do not use the default Alpine.js CDN, but instead use npm dependencies in hub-extend.js -->
    {{--<script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>--}}
    {{--<script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>--}}
    {{--<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>--}}

    @livewireStyles

    <!-- Similar to styles frontend stack specifically to append styles to the Hub. -->
    @stack('hub-styles')
</head>

<body class="h-full overflow-hidden bg-gray-50 bg-black/20 antialiased dark:bg-gray-900"
    x-data="{
        showExpandedMenu: $persist(false),
        showMobileMenu: false,
        toggleMenu () {
            this.menuCollapsed = !this.menuCollapsed
            this.showMobileMenu = !this.showMobileMenu
          }
    }">
    {!! \Lunar\Hub\LunarHub::paymentIcons() !!}

    <div class="flex h-full">
        <x-hub::menus.app-side />

        <div class="flex min-w-0 flex-1 flex-col overflow-hidden">

            <!-- Custom header -->
            @include('adminhub::partials.navigation.header')

            <main class="flex flex-1 overflow-hidden">
                <section class="h-full min-w-0 flex-1 overflow-y-auto lg:order-last">
                    <div class="{{ config('lunar-hub.system.layout_width', 'max-w-screen-2xl') }} mx-auto p-12">
                        @yield('main', $slot)
                    </div>
                </section>

                @yield('menu')

                <!-- @todo Check if this is being used? -->
                @if ($menu ?? false)
                    @include('adminhub::partials.navigation.side-menu-nested')
                @endif
            </main>
        </div>
    </div>

    <!-- Note: Commented out until Lunar supports Laravel 10 -->
    {{--@livewire('hub-license')--}}

    <!-- @todo Add feature flag check for hub notification. -->
    {{--@livewire('system.real-time-notifications')--}}

    <x-hub::notification />

    @livewireScripts

    @if ($scripts = \Lunar\Hub\LunarHub::scripts())
        @foreach ($scripts as $asset)
            <script src="{!! $asset->url() !!}"></script>
        @endforeach
    @endif

    <!-- @todo: See if we can remove this once injected into hub-extend.js? -->
    <script src="{{ asset('vendor/lunar/admin-hub/app.js') }}"></script>

    <!-- Similar to scripts frontend stack specifically to append scripts and override the Hub. -->
    @stack('hub-scripts')
</body>

</html>
