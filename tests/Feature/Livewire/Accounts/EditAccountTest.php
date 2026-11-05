<?php

use App\Models\Account;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('renders the account edit page with its current values', function () {
    $account = Account::factory()->create([
        'name' => 'Emergency Fund',
        'initial_balance' => 250.50,
    ]);

    $this->get(route('accounts.edit', $account))
        ->assertOk()
        ->assertSeeLivewire('accounts.edit-account');

    Livewire::test('accounts.edit-account', ['account' => $account])
        ->assertSet('name', 'Emergency Fund')
        ->assertSet('initial_balance', '250.50');
});

it('updates an account with valid values', function () {
    $account = Account::factory()->create([
        'name' => 'Cash',
        'initial_balance' => 100,
    ]);

    Livewire::test('accounts.edit-account', ['account' => $account])
        ->set('name', 'Daily Expenses')
        ->set('initial_balance', '325.75')
        ->call('save')
        ->assertHasNoErrors()
        ->assertRedirect(route('accounts.index'));

    expect($account->refresh())
        ->name->toBe('Daily Expenses')
        ->initial_balance->toBe('325.75');
});

it('keeps the stored account unchanged when validation fails', function () {
    $account = Account::factory()->create([
        'name' => 'Savings',
        'initial_balance' => 500,
    ]);

    Livewire::test('accounts.edit-account', ['account' => $account])
        ->set('name', '')
        ->set('initial_balance', '12.345')
        ->call('save')
        ->assertHasErrors([
            'name' => 'required',
            'initial_balance' => 'decimal',
        ])
        ->assertNoRedirect();

    expect($account->refresh())
        ->name->toBe('Savings')
        ->initial_balance->toBe('500.00');
});
