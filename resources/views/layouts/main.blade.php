@extends('layouts.layout-sidebar-header')

@section('content')
    <flux:heading size="xl" level="1">
        @yield('title')
    </flux:heading>
    <flux:text class="mt-2 mb-6 text-base">
        @yield('description')
    </flux:text>
    <flux:separator variant="subtle" />
    <div class="flex flex-col py-6 space-y-6">
        @yield('main')
    </div>
@endsection
