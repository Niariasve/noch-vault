@extends('layouts.main')

@section('title', 'Finance')

@section('description')
    Manage your accounts, transactions, and budgets.
@endsection

@php
    $navbarLinks = [
        ['url' => route('accounts.index'), 'label' => 'Accounts'],
        ['label' => 'Transacctions'],
        ['label' => 'Categories'],
    ];
@endphp

@section('main')
    <div class="flex flex-col my-6 gap-6">
        This will be a beauriful dashboard someday
    </div>
@endsection
