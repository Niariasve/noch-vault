@extends('finance.accounts.layout')

@section('title', 'Create Account')

@section('description')
    Create a new account.
@endsection

@section('account.content')
    <livewire:accounts.create-account />
@endsection