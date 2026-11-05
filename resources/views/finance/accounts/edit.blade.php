@extends('finance.accounts.layout')

@section('title', 'Edit Account')

@section('description')
    Update the account details.
@endsection

@section('account.content')
    <livewire:accounts.edit-account :account="$account" />
@endsection
