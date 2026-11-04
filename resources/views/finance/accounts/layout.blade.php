@extends('layouts.main')

@php
    $navbarLinks = [
        ['url' => route('finance.index'), 'label' => 'Finance'],
        ['url' => route('accounts.index'), 'label' => 'All'],
        ['url' => route('accounts.create'), 'label' => 'New account'],
    ];
@endphp

@section('main')
    @yield('account.content')
@endsection
