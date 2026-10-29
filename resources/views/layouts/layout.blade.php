<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name', 'Noch Vault') }}</title>

    @fonts

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    @ddfsnAppearance
    @ddfsnStyles
</head>
<body class="min-h-screen bg-[color-mix(in_oklab,var(--accent)_30%,var(--background))] text-(--foreground) antialiased">
    <x-sidebar fixed>
        <ddfsn-sidebar-toggle class="lg:hidden">
            <x-btn
                class="-ml-2"
                style="ghost"
                size="icon"
                aria-label="{{ __('Close sidebar') }}">
                <x-heroicon-o-x-mark class="text-(--muted-foreground)" />
            </x-btn>
        </ddfsn-sidebar-toggle>

        <nav aria-label="Main">
            <ul class="[&>li:not(:last-child)]:mb-1 **:data-[slot=button]:w-full **:data-[slot=button]:justify-start">
                <li>
                    <x-btn href="#" size="sm" style="ghost">
                        <x-heroicon-s-home-modern />
                        Home
                    </x-btn>
                </li>
                <li>
                    <x-btn href="{{ route('finance.index') }}" size="sm" style="ghost">
                        <x-heroicon-s-credit-card />
                        Finance
                    </x-btn>
                </li>
                <!-- ... -->
            </ul>
        </nav>

        <!-- ... -->
    </x-sidebar>

    <x-header class="*:data-[slot=container]:px-4" container="full" fixed>
        <div class="flex items-center justify-between gap-2">
            <ddfsn-sidebar-toggle class="lg:hidden">
                <x-btn
                    class="-ml-2"
                    style="ghost"
                    size="icon"
                    aria-label="{{ __('Open sidebar') }}">
                    <x-heroicon-o-bars-2 class="text-(--muted-foreground)" />
                </x-btn>
            </ddfsn-sidebar-toggle>

            <x-avatar size="sm" />
        </div>
    </x-header>

    <x-main container="xl">
        <div class="p-6 flex flex-col">
            @yield('content')
        </div>
    </x-main>

    @ddfsnScripts
</body>
</html>