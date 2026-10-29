@extends('layouts.main')

@section('title', 'Accounts')

@section('description')
    Manage your accounts.
@endsection

@php
    $links = [
        ['url' => route('accounts.index'), 'label' => 'All'],
        ['url' => route('accounts.create'), 'label' => 'New account'],
    ];
@endphp

@section('main')
    <x-nav-links :links="$links"></x-nav-links>

    <x-table>
        <x-table-caption>Manage all your accounts.</x-table-caption>
        <x-table-header>
            <x-table-row>
                <x-table-head>ID</x-table-head>
                <x-table-head>Name</x-table-head>
                <x-table-head>Balance</x-table-head>
                <x-table-head>Updated At</x-table-head>
                <x-table-head>Created At</x-table-head>
            </x-table-row>
        </x-table-header>
        <x-table-body>
            @foreach ($accounts as $account)
                <x-table-row>
                    <x-table-cell>{{ $account->id }}</x-table-cell>
                    <x-table-cell>{{ $account->name }}</x-table-cell>
                    <x-table-cell>{{ $account->balance }}</x-table-cell>
                    <x-table-cell>{{ $account->updated_at }}</x-table-cell>
                    <x-table-cell>{{ $account->created_at }}</x-table-cell>
                </x-table-row>
            @endforeach
        </x-table-body>
    </x-table>
@endsection
