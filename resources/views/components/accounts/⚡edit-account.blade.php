<?php

use App\Models\Account;
use App\Support\Validation\AccountRules;
use Livewire\Component;

new class extends Component {
    public Account $account;
    public string $name = '';
    public string $initial_balance = '';

    public function mount(Account $account): void
    {
        $this->account = $account;
        $this->name = $account->name;
        $this->initial_balance = $account->initial_balance;
    }

    public function save(): void
    {
        $validated = $this->validate(AccountRules::update());

        $this->account->update($validated);

        session()->flash('success', 'Account updated successfully.');

        $this->redirectRoute('accounts.index');
    }
};
?>

<div>
    <form wire:submit="save">
        <div class="mx-auto max-w-2xl">
            <flux:fieldset>
                <flux:legend>Account Information</flux:legend>

                <div class="space-y-6">
                    <flux:input wire:model="name" label="Name" badge="Required" />

                    <flux:input wire:model="initial_balance" label="Initial balance" type="number" step="0.01"
                        badge="Required" />

                    <div class="flex justify-end gap-3">
                        <flux:button :href="route('accounts.index')" variant="ghost">Cancel</flux:button>
                        <flux:button type="submit" variant="primary">Save Changes</flux:button>
                    </div>
                </div>
            </flux:fieldset>
        </div>
    </form>
</div>
