@extends('finance.accounts.layout')

@section('title', 'Accounts')

@section('description')
    Manage your accounts.
@endsection

@section('account.content')
    @session('success')
        <x-alert style="success">{{ session('success') }}</x-alert>
    @endsession
    <flux:table :paginate="$accounts">
        <flux:table.columns>
            <flux:table.column>ID</flux:table.column>
            <flux:table.column>Name</flux:table.column>
            <flux:table.column>Balance</flux:table.column>
            <flux:table.column>Updated At</flux:table.column>
            <flux:table.column>Created At</flux:table.column>
            <flux:table.column>Actions</flux:table.column>
        </flux:table.columns>

        <flux:table.rows>
            @foreach ($accounts as $account)
                <flux:table.row :key="$account->id">
                    <flux:table.cell>{{ $account->id }}</flux:table.cell>
                    <flux:table.cell>{{ $account->name }}</flux:table.cell>
                    <flux:table.cell>{{ $account->balance }}</flux:table.cell>
                    <flux:table.cell>{{ $account->updated_at }}</flux:table.cell>
                    <flux:table.cell>{{ $account->created_at }}</flux:table.cell>
                    <flux:table.cell>
                        <flux:button :href="route('accounts.show', $account->id)" icon="eye" variant="outline"
                            size="sm" />
                        <flux:button :href="route('accounts.edit', $account->id)" icon="pencil-square" variant="outline"
                            size="sm" />
                        <flux:button :href="route('accounts.destroy', $account->id)" icon="trash" variant="danger"
                            size="sm" />
                    </flux:table.cell>
                </flux:table.row>
            @endforeach

        </flux:table.rows>
    </flux:table>
@endsection
