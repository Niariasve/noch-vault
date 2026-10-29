@extends('layouts.layout')

@section('content')
    <div class="flex flex-col gap-4 mb-6">
        <x-heading :as-heading="true" class="text-2xl">
            @yield('title')
        </x-heading>

        <x-paragraph>
            @yield('description')
        </x-paragraph>
    </div>

    <div class="space-y-6">
        @yield('main')
    </div>
@endsection
