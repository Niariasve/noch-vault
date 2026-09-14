@extends('layouts.layout')

@section('content')
    <div class="flex flex-col gap-4">
        <x-heading :as-heading="true" class="text-2xl">
            @yield('title')
        </x-heading>

        <x-paragraph>
            @yield('description')
        </x-paragraph>
    </div>


    @yield('main')
@endsection
