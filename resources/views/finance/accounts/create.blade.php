@extends('finance.accounts.layout')

@section('title', 'Create Account')

@section('description')
    Create a new account.
@endsection

@section('account.content')
    <x-form action="/finance/accounts" method="POST">
        <x-form-sections>
            <x-form-section title="Account Information" description="Fields with * are required.">
                <div class="flex flex-col gap-4">
                    <x-form-input class="px-4" name="name" label="Name *" description="Account's name."
                        placeholder="My First Account" />

                    <x-form-input class="px-4" name="initial_balance" label="Balance *" description="Account's current balance."
                        placeholder="100.00" />

                </div>
            </x-form-section>
            <x-btn type="submit">Create account</x-btn>
        </x-form-sections>
    </x-form>
@endsection
