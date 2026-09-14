@extends('layouts.main')

@section('title', 'Finance')

@section('description')
    Manage your accounts, transactions, and budgets.
@endsection

@section('main')
    <div class="flex flex-col my-6 gap-6">
        <x-btn.group>
            <x-btn style="outline">Accounts</x-btn>
            <x-btn style="outline">Transactions</x-btn>
            <x-btn style="outline">Cateogories</x-btn>
        </x-btn.group>

        This will be a beauriful dashboard someday
    </div>
@endsection
