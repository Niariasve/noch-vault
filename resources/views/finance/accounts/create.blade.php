@extends('finance.accounts.layout')

@section('title', 'Create Account')

@section('description')
    Create a new account.
@endsection

@section('account.content')
    <form action="{{ route('accounts.store') }}" method="POST">
        @csrf

        <div class="max-w-2xl mx-auto">
            <flux:fieldset class="justify-center">
                <flux:legend>Account Information</flux:legend>
    
                <div class="space-y-6">
                    <flux:input label="Name" name="name" badge="Required" placeholder="Diner's club" required/>
                    <flux:input label="Initial balance" name="initial_balance" badge="Required" placeholder="1500.00" required/>
                    <div class="flex justify-end">
                        <flux:button type="submit">Create account</flux:button>
                    </div>
                </div>
            </flux:fieldset>
        </div>
    </form>
@endsection

{{-- @section('account.content')
    <x-form action="/finance/accounts" method="POST">
        <x-form-sections>
            <x-form-section title="Account Information" description="Fields with * are required.">
                <div class="flex flex-col gap-4">
                    @if ($errors->any())
                        <x-alert style="danger">
                            There are some field errors!
                        </x-alert>
                    @endif
                    
                    <x-form-input class="px-4" name="name" label="Name *" description="Account's name."
                        placeholder="My First Account" />

                    <x-form-input class="px-4" name="initial_balance" label="Balance *"
                        description="Account's current balance." placeholder="100.00" />

                </div>
            </x-form-section>
            <x-btn type="submit">Create account</x-btn>
        </x-form-sections>
    </x-form>
@endsection --}}
