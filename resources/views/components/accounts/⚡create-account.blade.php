<?php

use App\Models\Account;
use App\Support\Validation\AccountRules;
use Livewire\Component;

new class extends Component {
    public string $name = '';
    public string $initial_balance = '';

    public function save(): void
    {
        $validated = $this->validate(AccountRules::create());

        Account::create($validated);

        session()->flash('success', 'Account created succesfully.');

        $this->redirectRoute('accounts.index');
    }
};
?>

<div>
    <form wire:submit="save">
        <div class="max-w-2xl mx-auto">
            <flux:fieldset>
                <flux:legend>Account Information</flux:legend>
                <div class="space-y-6">
                    <flux:input wire:model="name" label="Name" badge="Required" placeholder="Diner's Club" />
                    <flux:input wire:model="initial_balance" label="Initial balance" type="number" step="0.01"
                        badge="Required" placeholder="1500.00" />
                    <div class="flex justify-end">
                        <flux:button type="submit">Create Account</flux:button>
                    </div>
                </div>
            </flux:fieldset>
        </div>
    </form>
</div>
