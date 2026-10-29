@extends('layouts.main')

@php
    $links = [
        ['url' => route('accounts.index'), 'label' => 'All'],
        ['url' => route('accounts.create'), 'label' => 'New account'],
    ];
@endphp

@section('main')
    <x-nav-links :links="$links" />
    @yield('account.content')
@endsection