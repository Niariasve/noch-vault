@extends('finance.accounts.layout')

@section('title', 'Accounts')

@section('description')
    Manage your accounts.
@endsection

@section('account.content')
    @session('success')
        <x-alert style="success">{{ session('success') }}</x-alert>
    @endsession
    <x-table>
        <x-table-caption>Manage all your accounts.</x-table-caption>
        <x-table-header>
            <x-table-row>
                <x-table-head>ID</x-table-head>
                <x-table-head>Name</x-table-head>
                <x-table-head>Balance</x-table-head>
                <x-table-head>Updated At</x-table-head>
                <x-table-head>Created At</x-table-head>
                <x-table-head>Actions</x-table-head>
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
                    <x-table-cell>
                        <x-btn href="{{ route('accounts.show', $account->id) }}" style="outline" size="icon-sm">
                            <x-heroicon-o-eye />
                        </x-btn>
                        <x-btn href="{{ route('accounts.edit', $account->id) }}" style="outline" size="icon-sm">
                            <x-heroicon-o-pencil-square />
                        </x-btn>
                        <x-btn href="{{ route('accounts.destroy', $account->id) }}" style="danger" size="icon-sm">
                            <x-heroicon-o-trash />
                        </x-btn>
                    </x-table-cell>
                </x-table-row>
            @endforeach
        </x-table-body>
    </x-table>
@endsection