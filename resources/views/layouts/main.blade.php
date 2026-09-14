@extends('layouts.layout')

@section('content')
    <x-heading :as-heading="true" class="text-2xl">
        @yield('title')
    </x-heading>

    <x-paragraph>
        @yield('description')
    </x-paragraph>

    @yield('main')
@endsection