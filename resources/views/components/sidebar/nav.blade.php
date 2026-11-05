<flux:sidebar.nav>
    <flux:sidebar.item icon="Home" href="/">Home</flux:sidebar.item>
    <flux:sidebar.item icon="currency-dollar" href="{{ route('finance.index') }}" wire:navigate>Finance</flux:sidebar.item>
    <flux:sidebar.group expandable icon="star" heading="Soon" class="grid">
        <flux:sidebar.item href="#">Marketing site</flux:sidebar.item>
        <flux:sidebar.item href="#">Android app</flux:sidebar.item>
        <flux:sidebar.item href="#">Brand guidelines</flux:sidebar.item>
    </flux:sidebar.group>
</flux:sidebar.nav>
<flux:sidebar.spacer />
<flux:sidebar.nav>
    <flux:sidebar.item icon="cog-6-tooth" href="#">Settings</flux:sidebar.item>
    <flux:sidebar.item icon="information-circle" href="#">Help</flux:sidebar.item>
</flux:sidebar.nav>
