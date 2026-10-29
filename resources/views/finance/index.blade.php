@extends('layouts.main')

@section('title', 'Finance')

@section('description')
    Manage your accounts, transactions, and budgets.
@endsection

@php
    $links = [
        ['url' => route('accounts.index'), 'label' => 'Accounts'],
        ['label' => 'Transacctions'],
        ['label' => 'Categories']
    ];
@endphp

@section('main')
    <div class="flex flex-col my-6 gap-6">
        <x-nav-links :links=$links></x-nav-links>

        This will be a beauriful dashboard someday
    </div>
@endsection
